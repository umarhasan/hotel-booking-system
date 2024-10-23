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
                <h1>Hotels Management</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Hotel Management</li>
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
                    <h3 class="card-title">Hotels List</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <div class="pull-right">
                      @can('user-create')
                        <a class="btn btn-primary" style="margin-bottom:5px" href="{{ route('hotels.create') }}"> + Add Hotels</a>
                      @endcan
                    </div>
                    <!-- <table id="example1" class="table table-bordered table-striped"> -->
                    <table id="order-listing" class="table dataTable no-footer" role="grid" aria-describedby="order-listing_info">
                      <thead>
                        <tr>
                          <th>S.No</th>
                          <th>Name</th>
                          <th>Logo</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if($hotels)
                        @php
                        $id =1;
                        @endphp
                        @foreach ($hotels as $hotel)
                        <tr>
                            <td>{{$id++}}</td>
                            <td>{{ $hotel->name }}</td>
                            <td><img src="{{ asset($hotel->logo ?? 'default_logo_path') }}" alt="{{ $hotel->name }} Logo" width="100"></td>
                            <td>
                                <div class="btn-group">

                                <a class="btn btn-primary btn-a" href="{{ route('hotels.edit',$hotel->id) }}"><i class="fa fa-edit"></i></a> &nbsp;
                                <a class="btn btn-primary btn-a" href="{{ route('hotels.rooms', ['hotel' => $hotel->id]) }}"><i class="fa fa-bed"></i></a> &nbsp;

                                <form method="post" action="{{route('hotels.destroy',$hotel->id)}}">
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
