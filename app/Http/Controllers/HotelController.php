<?php
// app/Http/Controllers/HotelController.php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HotelController extends Controller
{
    public function index()
    {
        $hotels = Hotel::all();
        return view('hotel.index', compact('hotels'));
    }

    public function create()
    {
        return view('hotel.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|max:2048', // 2MB Max
        ]);


        $logo = $request->file('logo')->store('public/hotel/logo');
        $validatedData['image'] = Storage::url($logo);

        $image = $request->file('image')->store('public/hotel');
        $validatedData['image'] = Storage::url($image);

        Hotel::create($validatedData);

        return redirect()->route('hotels.index');
    }

    public function show(Hotel $hotel)
    {
        return view('hotel.show', compact('hotel'));
    }

    public function edit(Hotel $hotel)
    {
        return view('hotel.edit', compact('hotel'));
    }

    public function update(Request $request, Hotel $hotel)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'sometimes|image|max:2048',
        ]);


        if ($request->hasFile(key: 'logo')) {
            $imagePath = $request->file('logo')->store('public/hotels/logo');
            $validatedData['logo'] = Storage::url($imagePath);
        }

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/hotels');
            $validatedData['image'] = Storage::url($imagePath);
        }

        $hotel->update($validatedData);
        return redirect()->route('hotels.index');
    }

    public function destroy(Hotel $hotel)
    {
        Storage::delete(str_replace('/storage', 'public', $hotel->image));
        $hotel->delete();
        return redirect()->route('hotels.index');
    }
}
