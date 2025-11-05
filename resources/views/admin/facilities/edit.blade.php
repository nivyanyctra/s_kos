@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h3>Edit Fasilitas</h3>

    <form action="{{ route('admin.facilities.update', $facility->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Fasilitas</label>
            <input type="text" name="name" value="{{ $facility->name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <input type="text" name="description" value="{{ $facility->description }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Gambar</label><br>
            @if ($facility->image_path)
                <img src="{{ asset('storage/' . $facility->image_path) }}" width="120" class="rounded mb-2"><br>
            @endif
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>

        <button class="btn btn-primary">Perbarui</button>
        <a href="{{ route('admin.facilities.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
