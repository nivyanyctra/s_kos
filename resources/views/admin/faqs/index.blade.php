@extends('layouts.admin')

@section('title', 'FAQs')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
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
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#editFAQModal{{ $data->id }}">
                                        Edit
                                    </button>
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
                                            <form action="{{ route('admin.faq.update', $data->id) }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')

                                                <div class="mb-3">
                                                    <label for="question" class="form-label">Icon</label>
                                                    <input type="text" class="form-control" id="question" name="question"
                                                    value="{{ old('question', $data->question) }}" required>
                                                    @error('question')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="answer" class="form-label">Judul</label>
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
