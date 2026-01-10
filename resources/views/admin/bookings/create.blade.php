@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h3>Tambah Booking</h3>

        <form action="{{ route('admin.bookings.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" name="name" id="name" class="form-control" required value="{{ old('name') }}">
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="tel" name="phone" id="phone" class="form-control" required
                    value="{{ old('phone') }}">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" name="email" id="email" class="form-control" required
                    value="{{ old('email') }}">
            </div>

            <div class="mb-3">
                <label for="duration" class="form-label">Booking Duration</label>
                <select name="duration" id="duration" class="form-select" required>
                    <option value="3 months" {{ old('duration') == '3 months' ? 'selected' : '' }}>3 months</option>
                    <option value="6 months" {{ old('duration') == '6 months' ? 'selected' : '' }}>6 months</option>
                    <option value="1 year" {{ old('duration') == '1 year' ? 'selected' : '' }}>1 year</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="room_id" class="form-label">Room</label>
                <select name="room_id" id="room_id" class="form-select" required>
                    <option value="">Select Room</option>
                    @foreach ($rooms as $room)
                        <option value="{{ $room->id }}" {{ old('room_id') == $room->id ? 'selected' : '' }}>
                            {{ $room->name }} - Rp {{ number_format($room->price, 0, ',', '.') }}/month
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="d-grid gap-2">
                <button class="btn btn-success">Simpan</button>
                <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
@endsection
