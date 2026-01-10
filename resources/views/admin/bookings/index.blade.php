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
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
    </style>

    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="fw-bold">Daftar Booking</h3>
            <a href="{{ route('admin.bookings.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Tambah Booking
            </a>
        </div>

        {{-- Alert sukses --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="row">
            @forelse ($bookings as $booking)
                <div class="col-md-6 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $booking->name }}</h5>
                            <p class="card-text mb-2"><strong>Email:</strong> {{ $booking->email }}</p>
                            <p class="card-text mb-2"><strong>Phone:</strong> {{ $booking->phone }}</p>
                            <p class="card-text mb-2"><strong>Duration:</strong> {{ $booking->duration }}</p>
                            <p class="card-text mb-2"><strong>Room:</strong> {{ $booking->room->name ?? 'N/A' }}</p>
                            <p class="card-text mb-2"><strong>Created:</strong> {{ $booking->created_at->format('d M Y') }}
                            </p>

                            <div class="mt-auto d-flex gap-2">
                                <a href="{{ route('admin.bookings.edit', $booking->id) }}"
                                    class="btn btn-warning btn-sm">Edit</a>
                                <form id="delete-form-{{ $booking->id }}"
                                    action="{{ route('admin.bookings.destroy', $booking->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-sm"
                                        onclick="confirmDelete({{ $booking->id }})">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center text-muted py-5">
                    <i class="bi bi-calendar-x" style="font-size: 2rem;"></i>
                    <p class="mt-2">Belum ada data booking</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Hapus booking?',
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
