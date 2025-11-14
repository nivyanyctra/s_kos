@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Manajemen Kamar</h2>

        {{-- 🔹 Pesan sukses --}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- 🔹 Form Tambah Kamar --}}
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">Tambah Kamar</div>
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
                                <option value="available">Tersedia</option>
                                <option value="occupied">Terisi</option>
                                <option value="maintenance">Perbaikan</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label>Deskripsi</label>
                        <textarea name="description" class="form-control" rows="2" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label>Gambar (opsional)</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-success">Tambah</button>
                </form>
            </div>
        </div>

        {{-- 🔹 Tabel Data Kamar --}}
        <div class="card">
            <div class="card-header bg-dark text-white">Daftar Kamar</div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
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

                        @foreach ($rooms as $room)
                            <tr>
                                <td>{{ $room->name }}</td>
                                <td>Rp{{ number_format($room->price, 0, ',', '.') }}</td>
                                <td>{{ $room->size }}</td>
                                <td>{{ ucfirst($room->status) }}</td>
                                <td>{{ $room->description }}</td>
                                <td>
                                    @if ($room->image_path)
                                        <img src="{{ asset('storage/' . $room->image_path) }}" width="70">
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#editModal{{ $room->id }}">
                                        Edit
                                    </button>

                                    <form action="{{ route('admin.rooms.destroy', $room->id) }}" method="POST"
                                        style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus kamar ini?')">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- ========================================================= --}}
    {{-- 🔹 SEMUA MODAL DI TARUH DI LUAR TABLE! (fix modal auto close) --}}
    {{-- ========================================================= --}}

    @foreach ($rooms as $room)
        <div class="modal fade" id="editModal{{ $room->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('admin.rooms.update', $room->id) }}" method="POST" enctype="multipart/form-data"
                    class="modal-content">
                    @csrf
                    @method('PUT')

                    <div class="modal-header">
                        <h5 class="modal-title">Edit Kamar: {{ $room->name }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-2">
                            <label>Nama</label>
                            <input type="text" name="name" class="form-control" value="{{ $room->name }}" required>
                        </div>

                        <div class="mb-2">
                            <label>Harga</label>
                            <input type="number" name="price" class="form-control" value="{{ $room->price }}" required>
                        </div>

                        <div class="mb-2">
                            <label>Ukuran</label>
                            <input type="text" name="size" class="form-control" value="{{ $room->size }}" required>
                        </div>

                        <div class="mb-2">
                            <label>Status</label>
                            <select name="status" class="form-select" required>
                                <option value="available" @selected($room->status == 'available')>Tersedia</option>
                                <option value="occupied" @selected($room->status == 'occupied')>Terisi</option>
                                <option value="maintenance" @selected($room->status == 'maintenance')>Perbaikan</option>
                            </select>
                        </div>

                        <div class="mb-2">
                            <label>Deskripsi</label>
                            <textarea name="description" class="form-control" rows="2">{{ $room->description }}</textarea>
                        </div>

                        <div class="mb-2">
                            <label>Gambar (opsional)</label><br>
                            @if ($room->image_path)
                                <img src="{{ asset('storage/' . $room->image_path) }}" width="70">
                            @else
                                -
                            @endif
                            <input type="file" name="image" class="form-control">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>

                </form>
            </div>
        </div>
    @endforeach
@endsection
