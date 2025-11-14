@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Edit Room</h1>

    <form action="{{ route('rooms.update', $room->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Room Name</label>
            <input type="text" name="name" class="form-control"
                   value="{{ old('name', $room->name) }}">
        </div>

        <div class="mb-3">
            <label>Price</label>
            <input type="number" name="price" class="form-control"
                   value="{{ old('price', $room->price) }}">
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control">{{ old('description', $room->description) }}</textarea>
        </div>

        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
