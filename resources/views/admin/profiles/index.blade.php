@extends('layouts.admin')

@section('title', 'Edit Setting')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Kos</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ old('name', $profile->name) }}" required>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="slogan" class="form-label">Slogan</label>
                        <textarea class="form-control" id="slogan" name="slogan" rows="3">{{ old('slogan', $profile->slogan) }}</textarea>
                        @error('slogan')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $profile->description) }}</textarea>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="story" class="form-label">Asal Usul</label>
                        <textarea class="form-control" id="story" name="story" rows="2" required>{{ old('story', $profile->story) }}</textarea>
                        @error('story')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="logo_path" class="form-label">Logo Baru</label>
                        <input type="file" class="form-control" id="logo_path" name="logo_path" accept="image/*">
                        <small class="form-text text-muted">Kosongkan jika tidak ingin mengganti logo.</small>

                        @if ($profile->logo_path)
                            <div class="mt-2">
                                <p>Logo saat ini:</p>
                                <img src="{{ Storage::url($profile->logo_path) }}" alt="Logo Sekarang" class="img-fluid"
                                    style="max-height: 100px;">
                            </div>
                        @endif
                        @error('logo_path')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="photo_path" class="form-label">Foto Baru</label>
                        <input type="file" class="form-control" id="photo_path" name="photo_path" accept="image/*">
                        <small class="form-text text-muted">Kosongkan jika tidak ingin mengganti foto.</small>

                        @if ($profile->photo_path)
                            <div class="mt-2">
                                <p>Foto saat ini:</p>
                                <img src="{{ Storage::url($profile->photo_path) }}" alt="Foto Sekarang" class="img-fluid"
                                    style="max-height: 100px;">
                            </div>
                        @endif
                        @error('photo_path')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="video_path" class="form-label">Video Baru</label>
                        <input type="file" class="form-control" id="video_path" name="video_path" accept="video/*">
                        <small class="form-text text-muted">Kosongkan jika tidak ingin mengganti video.</small>

                        @if ($profile->video_path)
                            <div class="mt-2">
                                <p>Video saat ini:</p>
                                <video width="320" height="240" controls>
                                    <source src="{{ Storage::url($profile->video_path) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        @endif
                        @error('video_path')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success w-100">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
