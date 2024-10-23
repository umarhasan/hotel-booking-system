@extends('layouts.app')
@section('content')
h1>{{ $hotel->name }}</h1>
    <p>{{ $hotel->location }}</p>
    <p>{{ $hotel->description }}</p>
    <img src="{{ asset($hotel->image) }}" alt="{{ $hotel->name }}" class="img-fluid">
    <a href="{{ route('hotels.edit', $hotel) }}" class="btn btn-primary">Edit</a>
    <form action="{{ route('hotels.destroy', $hotel) }}" method="POST" onsubmit="return confirm('Are you sure?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
@endsection
