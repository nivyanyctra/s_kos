@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h3>Edit Kamar</h3>

    <form action="{{ route('admin.rooms.update', $room->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nama Kamar</label>
            <input type="text" name="name" id="name" class="form-control" required value="{{ old('name', $room->name) }}">
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Harga (Rp)</label>
            <input type="number" name="price" id="price" class="form-control" required value="{{ old('price', $room->price) }}">
        </div>

        <div class="mb-3">
            <label for="size" class="form-label">Ukuran (contoh: 3x4)</label>
            <input type="text" name="size" id="size" class="form-control" required value="{{ old('size', $room->size) }}">
        </div>

        <div class="mb-3">
            <label for="facilities" class="form-label">Fasilitas</label>
            <div class="form-check">
                @foreach($facilities as $facility)
                    <input class="form-check-input" type="checkbox" name="facilities[]" value="{{ $facility->id }}" id="facility{{ $facility->id }}"
                    {{ in_array($facility->id, old('facilities', $room->facilities->pluck('id')->toArray())) ? 'checked' : '' }}>
                    <label class="form-check-label" for="facility{{ $facility->id }}">
                        {{ $facility->name }}
                    </label><br>
                @endforeach
            </div>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select" required>
                <option value="available" {{ old('status', $room->status) == 'available' ? 'selected' : '' }}>Tersedia</option>
                <option value="occupied" {{ old('status', $room->status) == 'occupied' ? 'selected' : '' }}>Terisi</option>
                <option value="maintenance" {{ old('status', $room->status) == 'maintenance' ? 'selected' : '' }}>Perbaikan</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea name="description" id="description" class="form-control" rows="2" required>{{ old('description', $room->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Foto Kamar</label><br>
            @if ($room->image_path)
                <img src="{{ asset('storage/' . $room->image_path) }}" width="120" class="rounded mb-2"><br>
            @endif
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>

        <button class="btn btn-primary">Perbarui</button>
        <a href="{{ route('admin.rooms.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
