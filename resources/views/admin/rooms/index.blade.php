@extends('layouts.admin')

@section('content')
<style>
    body {
        background-color: #f8f9fa;
    }
    .card {
        transition: all 0.2s ease-in-out;
    }
    .card:hover {
        transform: translateY(-15px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
</style>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-bold">Daftar Kamar</h3>
        <a href="{{ route('admin.rooms.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Kamar
        </a>
    </div>

    {{-- Alert sukses --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row">
        @forelse ($rooms as $room)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    @if ($room->image_path)
                        <img src="{{ asset('storage/' . $room->image_path) }}" class="card-img-top" alt="{{ $room->name }}" style="height:200px; object-fit:cover;">
                    @endif

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $room->name }}</h5>
                        <p class="card-text flex-grow-1">{{ Str::limit($room->description, 100) }}</p>

                        <div class="mt-auto d-flex">
                            <a href="{{ route('admin.rooms.edit', $room->id) }}" class="btn btn-warning btn-sm me-1">Edit</a>
                            <form id="delete-form-{{ $room->id }}" action="{{ route('admin.rooms.destroy', $room->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger btn-sm me-2" onclick="confirmDelete({{ $room->id }})">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center text-muted py-5">
                <i class="bi bi-box-seam" style="font-size: 2rem;"></i>
                <p class="mt-2">Belum ada data kamar</p>
            </div>
        @endforelse
    </div>
</div>
@endsection

@push('scripts')
<script>
function confirmDelete(id) {
    Swal.fire({
        title: 'Hapus kamar?',
        text: "Data tidak dapat dikembalikan setelah dihapus!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal',
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById(`delete-form-${id}`).submit();
        }
    })
}
</script>
@endpush
