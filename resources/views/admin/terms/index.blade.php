@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h3>Edit Terms & Conditions</h3>

        <form action="{{ route('admin.terms.update', $term->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" required
                    value="{{ old('title', $term->title) }}">
            </div>

            <div class="mb-3">
                <label for="version" class="form-label">Version</label>
                <input type="text" name="version" id="version" class="form-control" required
                    value="{{ old('version', $term->version) }}">
            </div>

            <div class="mb-3">
                <label for="effective_date" class="form-label">Effective Date</label>
                <input type="date" name="effective_date" id="effective_date" class="form-control" required
                    value="{{ old('effective_date', $term->effective_date) }}">
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <input id="content" type="hidden" name="content" value="{{ old('content', $term->content) }}">
                <trix-editor input="content"></trix-editor>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" name="is_active" id="is_active" class="form-check-input"
                    {{ old('is_active', $term->is_active) ? 'checked' : '' }}>
                <label for="is_active" class="form-check-label">Is Active</label>
            </div>

            <div class="d-grid gap-2">
                <button class="btn btn-success">Update</button>
                <a href="{{ route('admin.terms.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.1.1/dist/trix.css">
@endpush

@push('scripts')
    <script type="text/javascript" src="https://unpkg.com/trix@2.1.1/dist/trix.umd.min.js"></script>
@endpush
