@extends('layouts.app')


@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Users Management</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Users Management</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Users List</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">

                    <!-- <table id="example1" class="table table-bordered table-striped"> -->
                    <table id="order-listing" class="table dataTable no-footer" role="grid" aria-describedby="order-listing_info">
                      <thead>
                        <tr>
                          <th>Room Name</th>
                          <th>Check In</th>
                          <th>Check-out</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if($bookings)
                        @php
                        $id =1;
                        @endphp
                        @foreach($bookings as $booking)
                        <tr>
                          <td>{{ $booking->room->name }}</td>
                          <td>{{ $booking->check_in }}</td>
                          <td>{{ $booking->check_out }}</td>
                          <td>{{ ucfirst($booking->status) }}</td>
                          <td>
                            <div class="btn-group">
                                <a class="btn btn-primary btn-a" href="{{ route('booking.show', [$booking]) }}"><i class="fa fa-eye"></i></a> &nbsp;
                              <form method="POST" action="{{ route('booking.destroy', [$hotel, $booking]) }}">
                                @csrf
                                @method('delete')
                                <button type="submit" onclick="return confirm('Are You Sure Want To Cancel Booking This.??')" type="button" class="btn btn-danger btn-b">Cancel Booking</button>
                              </form>&nbsp;&nbsp;
                              <a class="btn btn-warning btn-a" href="{{ route('booking.invoice.print', $booking->id) }}" target="_blank" class="btn btn-primary"><i class="fa fa-file-invoice"></i></a>

                            </div>
                          </td>

                        </tr>
                        @endforeach
                        @endif
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
    </div>
  </div>
</div>
@endsection
