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
                <h1>Rooms Management</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Rooms Management</li>
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
                    <h3 class="card-title">Rooms List</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <div class="pull-right">
                        <h1>Rooms in {{ $hotel->name }}</h1>
                 <a class="btn btn-primary" style="margin-bottom:5px" href="{{ route('hotels.rooms.create', $hotel->id) }}">+ Add Room</a>
                    </div>
                    <!-- <table id="example1" class="table table-bordered table-striped"> -->
                    <table id="order-listing" class="table dataTable no-footer" role="grid" aria-describedby="order-listing_info">
                      <thead>
                        <tr>
                          <th>S.No</th>
                          <th>Name</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if($rooms)
                        @php
                        $id =1;
                        @endphp
                        @foreach($rooms as $key => $room)
                        <tr>
                          <td>{{$id++}}</td>
                          <td>{{ $room->name }}</td>
                          <td>
                            <div class="btn-group">
                            <a class="btn btn-warning btn-a" href="{{ route('hotels.rooms.images.index', [$hotel->id, $room->id]) }}" class="btn btn-info"><i class="fa fa-image"></i></a>&nbsp;
                            <a class="btn btn-primary btn-a" href="{{ route('hotels.rooms.edit', [$hotel->id, $room->id]) }}"><i class="fa fa-edit"></i></a>
                              <form method="post" action="{{ route('hotels.rooms.destroy', [$hotel->id, $room->id]) }}">
                                @csrf
                                @method('delete')
                                <button type="submit" onclick="return confirm('Are You Sure Want To Delete This.??')" type="button" class="btn btn-danger btn-b"><i class="fa fa-trash"></i></button>
                              </form>
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
