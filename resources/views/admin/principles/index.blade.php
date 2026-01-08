@extends('layouts.admin')

@section('title', 'Principles')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <table class="table mb-4">
                    <thead>
                        <tr>
                            <th scope="col">Icon</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($principles as $principle)
                            <tr>
                                <td class="text-center"><i class="fa-solid {{ $principle->icon }}"></i></td>
                                <td>{{ $principle->title }}</td>
                                <td>{{ $principle->description }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#editPrincipleModal{{ $principle->id }}">
                                        Edit
                                    </button>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="editPrincipleModal{{ $principle->id }}" tabindex="-1"
                                aria-labelledby="editPrincipleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editPrincipleModalLabel">Edit Principle</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('admin.principle.update', $principle->id) }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')

                                                <div class="mb-3">
                                                    <label for="icon" class="form-label">Icon</label>
                                                    <input type="text" class="form-control" id="icon" name="icon"
                                                    value="{{ old('icon', $principle->icon) }}" required>
                                                    <small>*cari icon di website <a href="https://fontawesome.com/icons" target="_blank">Font Awesome</a></small>
                                                    @error('icon')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="title" class="form-label">Judul</label>
                                                    <input type="text" class="form-control" id="title" name="title"
                                                        value="{{ old('title', $principle->title) }}" required>
                                                    @error('title')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="description" class="form-label">Deskripsi</label>
                                                    <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $principle->description) }}</textarea>
                                                    @error('description')
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
