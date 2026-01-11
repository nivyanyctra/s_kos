@extends('layouts.admin')

@section('title', 'Edit Setting')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.contact.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="address" name="address"
                            value="{{ old('address', $contact->address) }}" required>
                        @error('address')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="business_hours" class="form-label">Jam Kerja</label>
                        <textarea class="form-control" id="business_hours" name="business_hours" rows="3">{{ old('business_hours', $contact->business_hours) }}</textarea>
                        @error('business_hours')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Alamat Email</label>
                        <input type="text" class="form-control" id="email" name="email"
                            value="{{ old('email', $contact->email) }}" required>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control" id="phone" name="phone"
                            value="{{ old('phone', $contact->phone) }}" required>
                        @error('phone')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="instagram" class="form-label">Instagram</label>
                        <input type="text" class="form-control" id="instagram" name="instagram"
                            value="{{ old('instagram', $contact->instagram) }}" required>
                        @error('instagram')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="facebook" class="form-label">Facebook</label>
                        <input type="text" class="form-control" id="facebook" name="facebook"
                            value="{{ old('facebook', $contact->facebook) }}" required>
                        @error('facebook')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="x" class="form-label">Twitter/X</label>
                        <input type="text" class="form-control" id="x" name="x"
                            value="{{ old('x', $contact->x) }}" required>
                        @error('x')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="youtube" class="form-label">YouTube</label>
                        <input type="text" class="form-control" id="youtube" name="youtube"
                            value="{{ old('youtube', $contact->youtube) }}" required>
                        @error('youtube')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="map_embed" class="form-label">Embed Map</label>
                        <input type="text" class="form-control" id="map_embed" name="map_embed"
                            value="{{ old('map_embed', $contact->map_embed) }}" required>
                        @error('map_embed')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success w-100">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
