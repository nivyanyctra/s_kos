@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Manajemen Kamar Kos</h2>

    {{-- Notifikasi sukses --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Form Tambah Kamar --}}
    <div class="card mb-4">
        <div class="card-header">Tambah Kamar Baru</div>
        <div class="card-body">
            <form action="{{ route('admin.rooms.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col">
                        <label>Nama Kamar</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="col">
                        <label>Harga</label>
                        <input type="number" name="price" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label>Ukuran</label>
                        <input type="text" name="size" class="form-control" required>
                    </div>
                    <div class="col">
                        <label>Status</label>
                        <select name="status" class="form-select" required>
                            <option value="available">Available</option>
                            <option value="occupied">Occupied</option>
                            <option value="maintenance">Maintenance</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label>Deskripsi</label>
                    <textarea name="description" class="form-control" required></textarea>
                </div>
                <div class="mb-3">
                    <label>Gambar (opsional)</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>

    {{-- Tabel Daftar Kamar --}}
    <div class="card">
        <div class="card-header">Daftar Kamar</div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Ukuran</th>
                        <th>Status</th>
                        <th>Deskripsi</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rooms as $room)
                    <tr>
                        <td>{{ $room->id }}</td>
                        <td>{{ $room->name }}</td>
                        <td>{{ $room->price }}</td>
                        <td>{{ $room->size }}</td>
                        <td>{{ $room->status }}</td>
                        <td>{{ $room->description }}</td>
                        <td>
                            @if($room->image_path)
                                <img src="{{ asset('storage/'.$room->image_path) }}" alt="Room Image" width="70">
                            @else
                                <small>Tidak ada</small>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('admin.rooms.destroy', $room->id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
