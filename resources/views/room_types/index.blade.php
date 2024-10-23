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
            <h1>Room Type</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Room Type</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Role List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-header">
              @can('room-type-create')
                <a class="btn btn-success" href="{{ route('room-types.create') }}"> Create New Room Type</a>
                @endcan
                </div>
              <div class="card-body">
              <table id="order-listing" class="table dataTable no-footer" role="grid" aria-describedby="order-listing_info">
                  <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>Descriptions</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @if($roomTypes)
                  @php
                  $id =1;
                  @endphp
                  @foreach($roomTypes as $key =>  $roomType)
                  <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $roomType->name }}</td>
                      <td>{{ $roomType->description }}</td>
                      <td>
                      <div class="btn-group">
                        <a class="btn btn-warning btn-b" href="{{ route('room-types.edit',$roomType->id) }}"><i class="fa fa-edit"></i></a>
                        @can('room-type-delete')
                          <form method="post" action="{{route('room-types.destroy',$roomType->id)}}">
                            @csrf
                            @method('delete')
                            <button type="submit" onclick="return confirm('Are You Sure Want To Delete This.??')" type="button" class="btn btn-danger btn-b"><i class="fa fa-trash"></i></button>
                          </form>
                        @endcan
        </td>
                  </tr>
                  @endforeach
                  @endif
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>Descriptions</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
{!! $roomTypes->render() !!}

@endsection
