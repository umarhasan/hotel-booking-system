@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Booking Details</h1>

        <div class="card">
            <div class="card-body">
                <!-- Displaying Guest Information and Room Details Side by Side -->
                <div class="row">
                    <!-- Guest Information -->
                    <div class="col-md-6">
                        <h4>Guest Information</h4>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Name:</strong> {{ $booking->name }}</li>
                            <li class="list-group-item"><strong>Email:</strong> {{ $booking->email }}</li>
                            <li class="list-group-item"><strong>Phone:</strong> {{ $booking->phone }}</li>
                            <li class="list-group-item"><strong>Address:</strong> {{ $booking->address }}</li>
                        </ul>
                    </div>

                    <!-- Booking Details -->
                    <div class="col-md-6">
                        <h4>Booking Details</h4>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Room:</strong> {{ $booking->room->name }} (ID: {{ $booking->room->id }})</li>
                            <li class="list-group-item"><strong>Check-in:</strong> {{ $booking->check_in }}</li>
                            <li class="list-group-item"><strong>Check-out:</strong> {{ $booking->check_out }}</li>
                            <li class="list-group-item"><strong>Adults:</strong> {{ $booking->adults }}</li>
                            <li class="list-group-item"><strong>Children:</strong> {{ $booking->children }}</li>
                            <li class="list-group-item"><strong>Status:</strong> {{ ucfirst($booking->status) }}</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Itemized Billing -->
            <!-- Itemized Billing Table -->
            <div class="table-responsive">
                <table class="table table-bordered mt-4">
                    <thead class="thead-light">
                        <tr>
                            <th>Description</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Room Booking ({{ $booking->room->name }} - Room ID: {{ $booking->room->id }})</td>
                            <td>${{ $booking->room->price }}</td>
                        </tr>
                        <!-- Add other charges or services here if any -->
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Total</th>
                            <th>${{ $booking->room->price }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>

            @if($booking->status === 'confirmed')
            <div class="card-footer d-flex justify-content-end">
                <!-- All buttons aligned to the right side -->
                <form action="{{ route('booking.destroy', [$hotel, $booking]) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger mr-2">Cancel Booking</button>
                </form>

                <!-- Print and Download Buttons -->
                <a href="{{ route('booking.invoice.print', $booking->id) }}" target="_blank" class="btn btn-primary mr-2">Print Invoice</a>

                <!-- Back to Bookings Button -->
                <a href="{{ route('booking.index', $hotel) }}" class="btn btn-secondary">Back to Bookings</a>
            </div>
            @else
            <div class="card-footer d-flex justify-content-end">
                <a href="{{ route('booking.index', $hotel) }}" class="btn btn-primary">Back to Bookings</a>
            </div>
            @endif
        </div>
    </div>
    </div>
@endsection
