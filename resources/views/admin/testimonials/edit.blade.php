@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Testimonial</h3>
                    </div>
                    <form action="{{ route('admin.testimonial.update', $testimonial) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Nama <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name', $testimonial->name) }}" required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="role">Jabatan</label>
                                <input type="text" class="form-control @error('role') is-invalid @enderror"
                                    id="role" name="role" value="{{ old('role', $testimonial->role) }}">
                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="text">Testimonial <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('text') is-invalid @enderror" id="text" name="text" rows="4"
                                    required>{{ old('text', $testimonial->text) }}</textarea>
                                @error('text')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="rating">Rating <span class="text-danger">*</span></label>
                                <select class="form-control @error('rating') is-invalid @enderror" id="rating"
                                    name="rating" required>
                                    <option value="">Pilih Rating</option>
                                    @for ($i = 1; $i <= 5; $i++)
                                        <option value="{{ $i }}"
                                            {{ old('rating', $testimonial->rating) == $i ? 'selected' : '' }}>
                                            {{ $i }} Bintang</option>
                                    @endfor
                                </select>
                                @error('rating')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="image">Foto</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                    id="image" name="image" accept="image/*">
                                @if ($testimonial->image)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $testimonial->image) }}" alt="Current Image"
                                            class="img-thumbnail" style="max-width: 200px;">
                                    </div>
                                @endif
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" id="is_active" name="is_active"
                                        value="1" {{ old('is_active', $testimonial->is_active) ? 'checked' : '' }}>
                                    <label for="is_active" class="custom-control-label">Aktif</label>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('admin.testimonial.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    // Show success message if exists
    @if (session('success'))
        Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: '{{ session('success') }}',
        timer: 3000,
        showConfirmButton: false
        });
    @endif
@endpush
