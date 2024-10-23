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
                  <div class="card-body">
                  <h2>Add New Images for Room: {{ $room->name }}</h2>
                  <form method="POST" action="{{ route('hotels.rooms.images.store', [$hotel->id, $room->id]) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="images">Room Images</label>
                      <input type="file" class="form-control-file" id="images" name="images[]" multiple>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Images</button>
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
