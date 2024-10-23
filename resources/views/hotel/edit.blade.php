@extends('layouts.app')


@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="content-wrapper">
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Edit Hotels</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Edit Hotels</li>
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
                    <form method="POST" action="{{ route('hotels.update', $hotel) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Hotel Name:</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $hotel->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="location">Location:</label>
                            <input type="text" class="form-control" id="location" name="location" value="{{ $hotel->location }}" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control" id="description" name="description">{{ $hotel->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Change Image:</label>
                            <input type="file" class="form-control" id="image" name="image">
                            <small>Current Image:</small><br>
                            <img src="{{ asset($hotel->image) }}" alt="{{ $hotel->name }}" width="200">
                        </div>

                        <div class="form-group">
                            <label for="logo">Change Logo:</label>
                            <input type="file" class="form-control" id="logo" name="logo">
                            <small>Current Logo:</small><br>
                            <img src="{{ asset($hotel->logo ?? 'default_logo_path_here') }}" alt="Hotel Logo" width="100">
                        </div>
                        <button type="submit" class="btn btn-primary">Update Hotel</button>
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
