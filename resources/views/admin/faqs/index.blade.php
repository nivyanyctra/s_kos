@extends('layouts.admin')

@section('title', 'FAQs')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('admin.faq.create') }}" class="btn btn-m btn-primary">Tambah FAQ</a>
                <table class="table mb-4">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Question</th>
                            <th scope="col">Answer</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($faq as $data)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $data->question }}</td>
                                <td>{{ $data->answer }}</td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-sm mb-1" data-bs-toggle="modal"
                                        data-bs-target="#editFAQModal{{ $data->id }}">
                                        Edit
                                    </button>
                                    <form id="delete-form-{{ $data->id }}"
                                        action="{{ route('admin.faq.destroy', $data->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-sm"
                                            onclick="confirmDelete({{ $data->id }})">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="editFAQModal{{ $data->id }}" tabindex="-1"
                                aria-labelledby="editFAQModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editFAQModalLabel">Edit FAQ</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('admin.faq.update', $data->id) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')

                                                <div class="mb-3">
                                                    <label for="question" class="form-label">Question</label>
                                                    <input type="text" class="form-control" id="question"
                                                        name="question" value="{{ old('question', $data->question) }}"
                                                        required>
                                                    @error('question')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="answer" class="form-label">Answer</label>
                                                    <input type="text" class="form-control" id="answer" name="answer"
                                                        value="{{ old('answer', $data->answer) }}" required>
                                                    @error('answer')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <button type="submit" class="btn btn-success w-100">Simpan
                                                    Perubahan</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Hapus faq?',
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
