@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="mb-4 text-center">Search Available Rooms in {{ $hotel->name }}</h1>

    <!-- Search Form -->
    <form action="{{ route('booking.search') }}" method="POST" class="mb-5">
        @csrf
        <div class="form-row justify-content-center">
            <div class="form-group col-md-3">
                <label for="check_in">Check-in Date:</label>
                <input type="date" name="check_in" class="form-control form-control-lg" value="{{ old('check_in', $validated['check_in'] ?? '') }}" required>
            </div>
            <div class="form-group col-md-3">
                <label for="check_out">Check-out Date:</label>
                <input type="date" name="check_out" class="form-control form-control-lg" value="{{ old('check_out', $validated['check_out'] ?? '') }}" required>
            </div>
            <div class="form-group col-md-2">
                <label for="adults">Adults:</label>
                <input type="number" name="adults" class="form-control form-control-lg" min="1" value="{{ old('adults', $validated['adults'] ?? 1) }}" required>
            </div>
            <div class="form-group col-md-2">
                <label for="children">Children:</label>
                <input type="number" name="children" class="form-control form-control-lg" min="0" value="{{ old('children', $validated['children'] ?? 0) }}">
            </div>
            <div class="form-group col-md-2 align-self-end">
                <button type="submit" class="btn btn-primary btn-lg btn-block">Search</button>
            </div>
        </div>
    </form>

    <!-- Search Results -->
    @if(isset($availableRooms))
        @if($availableRooms->isEmpty())
            <div class="alert alert-warning text-center" role="alert">
                No rooms available for the selected dates.
            </div>
        @else
            <div class="row">
                @foreach($availableRooms as $room)
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            @if($room->images->first())
                                <img src="{{ asset('storage/' . $room->images->first()->image) }}" class="card-img-top" alt="{{ $room->name }}">
                            @else
                                <img src="https://via.placeholder.com/350x200?text=No+Image" class="card-img-top" alt="No Image">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $room->name }}</h5>
                                <p class="card-text">
                                    <strong>Type:</strong> {{ $room->RoomType->name ?? '' }}<br>
                                    <strong>Price:</strong> ${{ number_format($room->price, 2) }} per night<br>
                                    <strong>Adults:</strong> {{ $room->adults }}<br>
                                    <strong>Children:</strong> {{ $room->children }}
                                </p>
                                <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#bookingModal{{ $room->id }}">
                                    Book Now
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Booking Modal -->
                    <div class="modal fade" id="bookingModal{{ $room->id }}" tabindex="-1" role="dialog" aria-labelledby="bookingModalLabel{{ $room->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="bookingModalLabel{{ $room->id }}">Booking Details for {{ $room->name }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('booking.store') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="room_id" value="{{ $room->id }}">

                                        <!-- Contact Info -->
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="modal_name{{ $room->id }}">Name:</label>
                                                <input type="text" name="name" id="modal_name{{ $room->id }}" class="form-control form-control-sm" value="{{ old('name', $validated['name'] ?? '') }}" placeholder="Full Name" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="modal_phone{{ $room->id }}">Phone:</label>
                                                <input type="text" name="phone" id="modal_phone{{ $room->id }}" class="form-control form-control-sm" value="{{ old('phone', $validated['phone'] ?? '') }}" placeholder="+923172112999" required>
                                            </div>
                                        </div>

                                        <!-- Other Info -->
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="modal_email{{ $room->id }}">Email:</label>
                                                <input type="email" name="email" id="modal_email{{ $room->id }}" class="form-control form-control-sm" value="{{ old('email', $validated['email'] ?? '') }}" placeholder="info@gmail.com" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="modal_address{{ $room->id }}">Address:</label>
                                                <textarea name="address" id="modal_address{{ $room->id }}" class="form-control form-control-sm" rows="2" placeholder="Full Address" required>{{ old('address', $validated['address'] ?? '') }}</textarea>
                                            </div>
                                        </div>

                                        <!-- Booking Info -->
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="modal_check_in{{ $room->id }}">Check-in Date:</label>
                                                <input type="date" name="check_in" id="modal_check_in{{ $room->id }}" class="form-control form-control-sm" value="{{ old('check_in', $validated['check_in'] ?? '') }}" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="modal_check_out{{ $room->id }}">Check-out Date:</label>
                                                <input type="date" name="check_out" id="modal_check_out{{ $room->id }}" class="form-control form-control-sm" value="{{ old('check_out', $validated['check_out'] ?? '') }}" required>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="modal_adults{{ $room->id }}">Adults:</label>
                                                <input type="number" name="adults" id="modal_adults{{ $room->id }}" class="form-control form-control-sm" value="{{ old('adults', $validated['adults'] ?? 1) }}" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="modal_children{{ $room->id }}">Children:</label>
                                                <input type="number" name="children" id="modal_children{{ $room->id }}" class="form-control form-control-sm" value="{{ old('children', $validated['children'] ?? 0) }}">
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-success btn-block">Confirm Booking</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Booking Modal -->
                @endforeach
            </div>
        @endif
    @endif
</div>
</div>
@endsection
