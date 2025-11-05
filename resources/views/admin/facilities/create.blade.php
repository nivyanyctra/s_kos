@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h3>Tambah Fasilitas</h3>

    <form action="{{ route('admin.facilities.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Nama Fasilitas</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <input type="text" name="description" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Gambar</label>
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('admin.facilities.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
