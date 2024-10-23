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
                <h1 class="display-4">Create New Room</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Create New Room</li>
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
                    <form method="POST" action="{{ route('hotels.rooms.store', $hotel) }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Room Name -->
                        <div class="form-group">
                            <label for="name" class="font-weight-bold">Room Name:</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter room name" required>
                        </div>

                        <!-- Room Type -->
                        <div class="form-group">
                            <label for="type" class="font-weight-bold">Room Type:</label>
                            <select class="form-control" id="type" name="type" required>
                                <option value="">Select Room Type</option>
                                @foreach($room_types as $id => $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Room Price -->
                        <div class="form-group">
                            <label for="price" class="font-weight-bold">Room Price (in PKR):</label>
                            <input type="number" class="form-control" id="price" name="price" step="0.01" placeholder="Enter price" required>
                        </div>

                        <!-- Adult/Child Dropdowns -->
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="adults" class="font-weight-bold">Number of Adults:</label>
                                <select class="form-control" id="adults" name="adults" required>
                                    <option value="1">1 Adult</option>
                                    <option value="2">2 Adults</option>
                                    <option value="3">3 Adults</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="children" class="font-weight-bold">Number of Children:</label>
                                <select class="form-control" id="children" name="children">
                                    <option value="0">No Children</option>
                                    <option value="1">1 Child</option>
                                    <option value="2">2 Children</option>
                                </select>
                            </div>
                        </div>

                        <!-- Room Benefits (Checkboxes) -->
                        <div class="form-group">
                            <label for="benefits" class="font-weight-bold">Room Benefits:</label>
                            <div class="row" style="margin: 0px 13px;">
                                @foreach($facilities as $benefit)
                                    <div class="col-md-3 col-sm-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="benefits[]" value="{{ $benefit }}" id="benefit_{{ $loop->index }}">
                                            <label class="form-check-label" for="benefit_{{ $loop->index }}">{{ $benefit }}</label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Additional Facilities (Dynamic) -->
                        <div class="form-group">
                            <label for="facilities" class="font-weight-bold">Additional Facilities:</label>
                            <input type="text" class="form-control mb-2" id="facility" name="facilities[]" placeholder="Enter facility">
                            <div id="additional-facilities"></div>
                            <button type="button" class="btn btn-secondary mt-2" id="add-facility">Add Another Facility</button>
                        </div>

                        <!-- Room Images -->
                        <div class="form-group">
                            <label for="images" class="font-weight-bold">Room Images:</label>
                            <input type="file" class="form-control-file" id="images" name="images[]" multiple>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary btn-block">Add Room</button>
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

<script>
    // Add dynamic facility input
    document.getElementById('add-facility').addEventListener('click', function() {
        var newFacility = document.createElement('input');
        newFacility.setAttribute('type', 'text');
        newFacility.setAttribute('class', 'form-control mb-2');
        newFacility.setAttribute('name', 'facilities[]');
        newFacility.setAttribute('placeholder', 'Enter Facility');
        document.getElementById('additional-facilities').appendChild(newFacility);
    });
</script>

@endsection
