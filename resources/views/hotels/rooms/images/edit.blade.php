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
                <h1 class="display-4">Create Room Image</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Create Room Image</li>
                </ol>
              </div>
            </div>
          </div>
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
              <div class="col-md-8 offset-md-2">
                <div class="card shadow-sm">
                  <div class="card-header bg-primary text-white">
                    <h3 class="card-title">Add Room for Hotel: {{ $hotel->name }}</h3>
                  </div>
                  <div class="card-body">
                  <h2>Edit Image for Room: {{ $room->name }}</h2>
                  <form method="POST" action="{{ route('hotels.rooms.images.update', [$hotel->id, $room->id, $image->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                      <label for="image">Replace Image</label>
                      <input type="file" class="form-control-file" id="image" name="image" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Image</button>
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
