<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Room;
use App\Models\Booking;
use Illuminate\Http\Request;
use PDF;

class BookingController extends Controller
{
    // Ensure all methods require authentication
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Display search form
    public function search(Request $request)
    {

        $user = auth()->user();
        $hotel = $user->hotel;

        if (!$hotel) {
            return redirect()->back()->withErrors('No hotel associated with your account.');
        }

        $availableRooms = collect(); // Initialize as empty collection

        if ($request->isMethod('post')) {
            // Validate the input
            $validated = $request->validate([
                'check_in' => 'required|date|after_or_equal:today',
                'check_out' => 'required|date|after:check_in',
                'adults' => 'required|integer|min:1',
                'children' => 'nullable|integer|min:0',
            ]);

            // Find available rooms
            $availableRooms = $this->getAvailableRooms($hotel, $validated);

            // Pass validated data to the view
            return view('bookings.search', compact('hotel', 'availableRooms', 'validated'));
        }

        // If GET request, just display the form
        return view('bookings.search', compact('hotel', 'availableRooms'));
    }

    // Show booking form for a specific room
    public function create(Room $room, Request $request)
    {
        $user = auth()->user();
        $hotel = $user->hotel;

        if (!$hotel) {
            return redirect()->back()->withErrors('No hotel associated with your account.');
        }

        $data = $request->only(['check_in', 'check_out', 'adults', 'children']);

        return view('bookings.create', compact('hotel', 'room', 'data'));
    }

    // Store booking information
    public function store(Request $request) // The $id parameter seems unnecessary if you pass room_id in the form
    {
        $room = Room::findOrFail($request->input('room_id'));
        $user = auth()->user();
        $hotel = $user->hotel;

        $validated = $request->validate([
            'check_in'      => 'required|date|after_or_equal:today',
            'check_out'     => 'required|date|after:check_in',
            'adults'        => 'required|integer|min:1',
            'children'      => 'nullable|integer|min:0',
            'name'          => 'nullable',
            'email'         => 'nullable',
            'phone'         => 'nullable',
            'address'       => 'nullable',
        ]);

        if (!$this->isRoomAvailable($room, $validated['check_in'], $validated['check_out'])) {
            return redirect()->back()->withErrors('The room is no longer available for the selected dates.');
        }

        Booking::create([
            'hotel_id' => $hotel->id,
            'room_id' => $room->id, // Ensure this uses the correct room_id
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'check_in' => $validated['check_in'],
            'check_out' => $validated['check_out'],
            'adults' => $validated['adults'],
            'children' => $validated['children'],
            'status' => 'confirmed',
            'user_id' => $user->id,
        ]);

        return redirect()->route('booking.index')->with('success', 'Booking confirmed!');
    }

    // List all bookings
    public function index()
    {
        $user = auth()->user();
        $hotel = $user->hotel;

        if (!$hotel) {
            return redirect()->back()->withErrors('No hotel associated with your account.');
        }

        $bookings = $hotel->bookings()->with('room')->latest()->get();
        return view('bookings.index', compact('hotel', 'bookings'));
    }

    // Show booking details
    public function show(Booking $booking)
    {
        $user = auth()->user();
        $hotel = $user->hotel;
        // Ensure the booking belongs to the user's hotel
        if ($booking->hotel_id !== $hotel->id) {
            abort(403, 'Unauthorized action.');
        }
        return view('bookings.show', compact('hotel', 'booking'));
    }

    // Cancel a booking
    public function destroy(Booking $booking)
    {
        $user = auth()->user();
        $hotel = $user->hotel;

        // Ensure the booking belongs to the user's hotel
        if ($booking->hotel_id !== $hotel->id) {
            abort(403, 'Unauthorized action.');
        }

        $booking->update(['status' => 'canceled']);
        return redirect()->route('booking.index')->with('success', 'Booking canceled.');
    }

    // Helper method to check room availability
    private function isRoomAvailable(Room $room, $check_in, $check_out)
    {
        $overlappingBookings = $room->bookings()
            ->where('status', 'confirmed')
            ->where(function ($query) use ($check_in, $check_out) {
                $query->whereBetween('check_in', [$check_in, $check_out])
                    ->orWhereBetween('check_out', [$check_in, $check_out])
                    ->orWhere(function ($q) use ($check_in, $check_out) {
                        $q->where('check_in', '<', $check_in)
                            ->where('check_out', '>', $check_out);
                    });
            })
            ->exists();

        return !$overlappingBookings;
    }

    // Helper method to get available rooms
    private function getAvailableRooms(Hotel $hotel, $data)
    {
        $bookedRoomIds = Booking::where('hotel_id', $hotel->id)
            ->where('status', 'confirmed')
            ->where(function ($query) use ($data) {
                $query->whereBetween('check_in', [$data['check_in'], $data['check_out']])
                    ->orWhereBetween('check_out', [$data['check_in'], $data['check_out']])
                    ->orWhere(function ($q) use ($data) {
                        $q->where('check_in', '<', $data['check_in'])
                            ->where('check_out', '>', $data['check_out']);
                    });
            })
            ->pluck('room_id');

        return $hotel->rooms()
            ->whereNotIn('id', $bookedRoomIds)
            ->get();
    }


    public function generateInvoice(Booking $booking)
    {
        $user = auth()->user();
        $hotel = $user->hotel;

        // Ensure the booking belongs to the user's hotel
        if ($booking->hotel_id !== $hotel->id) {
            abort(403, 'Unauthorized action.');
        }

        // Load view with booking details for the PDF
        $pdf = PDF::loadView('bookings.invoice', compact('booking', 'hotel'));

        // Return PDF as a downloadable file
        return $pdf->download('invoice_' . $booking->id . '.pdf');
    }
    public function printInvoice(Booking $booking)
    {
        $user = auth()->user();
        $hotel = $user->hotel;

        if ($booking->hotel_id !== $hotel->id) {
            abort(403, 'Unauthorized action.');
        }

        return view('bookings.invoice', compact('booking', 'hotel')); // View the invoice in browser
    }
}
