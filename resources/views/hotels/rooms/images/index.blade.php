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
                <h1>Rooms Images</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Rooms Images</li>
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
                    <h3 class="card-title">Rooms Image List</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <div class="pull-right">
                      <h2>Images for Room: {{ $room->name }}</h2>
                      <a class="btn btn-primary" href="{{ route('hotels.rooms.images.create', [$hotel->id, $room->id]) }}">+ Add New Image</a>
                     </div>
                    <!-- <table id="example1" class="table table-bordered table-striped"> -->
                    <table id="order-listing" class="table dataTable no-footer" role="grid" aria-describedby="order-listing_info">
                      <thead>
                        <tr>
                          <th>Image</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if($images)
                        @php
                        $id =1;
                        @endphp
                        @foreach($images as $image)
                          <tr>
                            <td><img src="{{ asset('storage/' . $image->image) }}" width="100"></td>
                            <td>
                              <a href="{{ route('hotels.rooms.images.edit', [$hotel->id, $room->id, $image->id]) }}" class="btn btn-primary">Edit</a>
                              <form action="{{ route('hotels.rooms.images.destroy', [$hotel->id, $room->id, $image->id]) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this image?')">Delete</button>
                              </form>
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
