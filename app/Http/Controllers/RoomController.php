<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Room;
use App\Models\RoomType;
use App\Models\RoomImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    
    public function index(Hotel $hotel)
    {
        $rooms = $hotel->rooms()->with('images')->get(); // Fetch all rooms for the hotel with their images

        return view('hotels.rooms.index', compact('hotel', 'rooms')); // Pass it as 'rooms'
    }

    public function create(Hotel $hotel)
    {
        // Define your room types and facilities, ideally fetched from a database or config
        $room_types = RoomType::get(); // You can replace this with a dynamic fetch from DB
        $facilities = ['Free Wi-Fi', 'Breakfast Included', 'Swimming Pool', 'Gym']; // Dynamic list from DB if needed
        return view('hotels.rooms.create', compact('hotel', 'room_types', 'facilities'));
    }

    public function store(Request $request, Hotel $hotel)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string', // Room type
            'price' => 'required|numeric',
            'adults' => 'required|integer',
            'children' => 'nullable|integer',
            'benefits' => 'nullable|array', // Validate benefits as an array
            'facilities' => 'nullable|array', // Validate facilities as an array
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Convert benefits and facilities to JSON
        $validated['benefits'] = json_encode($request->benefits);
        $validated['facilities'] = json_encode($request->facilities);

        // Store room details in the database
        $room = $hotel->rooms()->create([
            'name' => $validated['name'],
            'type' => $validated['type'],
            'price' => $validated['price'],
            'adults' => $validated['adults'],
            'children' => $validated['children'],
            'benefits' => $validated['benefits'],
            'facilities' => $validated['facilities'],
            'is_available' => true,
        ]);

        // Handle image uploads (if any)
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('rooms', 'public');
                $room->images()->create(['image' => $path]);
            }
        }

        return redirect()->route('hotels.rooms', $hotel);
    }

    public function edit(Hotel $hotel, Room $room)
    {
        // Fetch room types and facilities
        $room_types = RoomType::get();
        $facilities = ['Free Wi-Fi', 'Breakfast Included', 'Swimming Pool', 'Gym']; // You can fetch this from DB
        return view('hotels.rooms.edit', compact('hotel', 'room', 'room_types', 'facilities'));
    }

    public function update(Request $request, Hotel $hotel, Room $room)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string', // Room type
            'price' => 'required|numeric',
            'adults' => 'required|integer',
            'children' => 'nullable|integer',
            'benefits' => 'nullable|array', // Validate benefits as an array
            'facilities' => 'nullable|array', // Validate facilities as an array
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Convert benefits and facilities to JSON
        $validated['benefits'] = json_encode($request->benefits);
        $validated['facilities'] = json_encode($request->facilities);

        // Update room details in the database
        $room->update([
            'name' => $validated['name'],
            'type' => $validated['type'],
            'price' => $validated['price'],
            'adults' => $validated['adults'],
            'children' => $validated['children'],
            'benefits' => $validated['benefits'],
            'facilities' => $validated['facilities'],
        ]);

        // Handle image uploads (if any)
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('rooms', 'public');
                $room->images()->create(['image' => $path]);
            }
        }

        return redirect()->route('hotels.rooms', $hotel)->with('success', 'Room updated successfully');
    }

    // List all images for a specific room
    public function indexImages(Hotel $hotel, Room $room)
    {
        $images = $room->images;  // Get all images for the room
        return view('hotels.rooms.images.index', compact('hotel', 'room', 'images'));
    }
    // Show form to create new images
    public function createImages(Hotel $hotel, Room $room)
    {
        return view('hotels.rooms.images.create', compact('hotel', 'room'));
    }

    // Store new images for the room
    public function storeImages(Request $request, Hotel $hotel, Room $room)
    {
        $validated = $request->validate([
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle image uploads
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('rooms', 'public');
                $room->images()->create(['image' => $path]);
            }
        }
        return redirect()->route('hotels.rooms.images.index', [$hotel, $room])->with('success', 'Images added successfully');
    }

    // Show form to edit an image
    public function editImages(Hotel $hotel, Room $room, RoomImage $image)
    {
        return view('hotels.rooms.images.edit', compact('hotel', 'room', 'image'));
    }

    // Update an image (replace the current image)
    public function updateImages(Request $request, Hotel $hotel, Room $room, RoomImage $image)
    {
        $validated = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        // Delete the old image
        Storage::delete('public/' . $image->image);
        // Store the new image
        $path = $request->file('image')->store('rooms', 'public');
        // Update image in the database
        $image->update(['image' => $path]);
        return redirect()->route('hotels.rooms.images.index', [$hotel, $room])->with('success', 'Image updated successfully');
    }

    // Delete an image
    public function destroyImage(Hotel $hotel, Room $room, RoomImage $image)
    {
        // Delete the image from storage
        Storage::delete('public/' . $image->image);
        // Delete the image record from the database
        $image->delete();
        return redirect()->route('hotels.rooms.images.index', [$hotel, $room])->with('success', 'Image deleted successfully');
    }

}
