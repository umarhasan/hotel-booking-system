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
                <h1>Create New User</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Create New User</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>
        <section class="content">
          <div class="container-fluid">
            @if (count($errors) > 0)
              <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <form action="{{ route('booking.store', [$hotel, $room]) }}" method="POST">
                        @csrf
                        <label for="check_in">Check-in Date:</label>
                        <input type="date" name="check_in" value="{{ $data['check_in'] }}" required>

                        <label for="check_out">Check-out Date:</label>
                        <input type="date" name="check_out" value="{{ $data['check_out'] }}" required>

                        <label for="adults">Adults:</label>
                        <input type="number" name="adults" min="1" value="{{ $data['adults'] }}" required>

                        <label for="children">Children:</label>
                        <input type="number" name="children" min="0" value="{{ $data['children'] ?? 0 }}">

                        <!-- Additional fields like guest info can be added here -->

                        <button type="submit">Confirm Booking</button>
                    </form>
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
