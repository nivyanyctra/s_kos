@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Tambah FAQ</h3>
                    </div>
                    <form action="{{ route('admin.faq.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="question">Pertanyaan <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('question') is-invalid @enderror" id="question" name="question" rows="3"
                                    required>{{ old('question') }}</textarea>
                                @error('question')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="answer">Jawaban <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('answer') is-invalid @enderror" id="answer" name="answer" rows="5"
                                    required>{{ old('answer') }}</textarea>
                                @error('answer')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('admin.faq.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
