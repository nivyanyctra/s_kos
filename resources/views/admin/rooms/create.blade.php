@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h3>Tambah Kamar</h3>

        <form action="{{ route('admin.rooms.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nama Kamar</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <input type="hidden" name="slug" id="slug">

            <script>
                document.getElementById('name').addEventListener('input', function() {
                    const slug = this.value
                        .toLowerCase()
                        .trim()
                        .replace(/\s+/g, '-')
                        .replace(/-+/g, '-')
                        .replace(/[^a-z0-9\s-]/g, '');

                    document.getElementById('slug').value = slug;
                });
            </script>
            <div class="mb-3">
                <label for="price" class="form-label">Harga (Rp)</label>
                <input type="number" name="price" id="price" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="size" class="form-label">Ukuran (contoh: 3x4 m)</label>
                <input type="text" name="size" id="size" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-select" required>
                    <option value="available">Tersedia</option>
                    <option value="occupied">Terisi</option>
                    <option value="maintenance">Perbaikan</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label>Foto Kamar</label><br>
                <input type="file" name="cover_image" class="form-control" accept="image/*">
            </div>

            <div class="d-grid gap-2">
                <button class="btn btn-success">Simpan</button>
                <a href="{{ route('admin.rooms.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
@endsection
