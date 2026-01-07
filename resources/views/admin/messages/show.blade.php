@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="fw-bold">Detail Pesan</h3>
            <a href="{{ route('admin.messages.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h5 class="text-muted mb-1">Pengirim</h5>
                        <p class="fs-5 fw-bold mb-0">{{ $contactMessage->name }}</p>
                        <p class="text-muted mb-0">{{ $contactMessage->email }}</p>
                        <p class="text-muted">{{ $contactMessage->phone }}</p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <h5 class="text-muted mb-1">Waktu Kirim</h5>
                        <p class="fs-5">{{ $contactMessage->created_at->format('d F Y, H:i') }}</p>
                    </div>
                </div>

                <hr>

                <div class="mb-4">
                    <h5 class="text-muted mb-2">Subjek</h5>
                    <p class="fs-5 fw-bold">{{ $contactMessage->subject }}</p>
                </div>

                <div class="mb-4">
                    <h5 class="text-muted mb-2">Pesan</h5>
                    <div class="p-4 bg-light rounded-3">
                        {{ $contactMessage->message }}
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="mailto:{{ $contactMessage->email }}?subject=Re: {{ $contactMessage->subject }}"
                        class="btn btn-primary">
                        <i class="bi bi-reply"></i> Balas Email
                    </a>
                    <form id="delete-form" action="{{ route('admin.messages.destroy', $contactMessage->id) }}"
                        method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger" onclick="confirmDelete()">
                            <i class="bi bi-trash"></i> Hapus Pesan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function confirmDelete() {
            Swal.fire({
                title: 'Hapus pesan?',
                text: "Pesan yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal',
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form').submit();
                }
            })
        }
    </script>
@endpush
