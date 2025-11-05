@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h3>Daftar Fasilitas</h3>
    <a href="{{ route('admin.facilities.create') }}" class="btn btn-primary mb-3">Tambah Fasilitas</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($facilities as $facility)
                <tr>
                    <td>{{ $facility->name }}</td>
                    <td>{{ $facility->description }}</td>
                    <td>
                        @if ($facility->image_path)
                            <img src="{{ asset('storage/' . $facility->image_path) }}" width="100" class="rounded">
                        @else
                            <span class="text-muted">Tidak ada gambar</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('facilities.edit', $facility->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('facilities.destroy', $facility->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin ingin menghapus fasilitas ini?')" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-center">Belum ada data fasilitas</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
