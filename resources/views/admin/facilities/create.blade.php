@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h3>Tambah Fasilitas</h3>

        <form action="{{ route('admin.facilities.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="room">Kamar</label>
                <select name="room_id" id="room" class="form-select" required>
                    @foreach ($rooms as $room)
                        <option value="{{ $room->id }}">{{ $room->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Nama Fasilitas</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Deskripsi</label>
                <input type="text" name="description" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Kategori</label>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="categories" value="Kasur" id="kasur">
                            <label class="form-check-label" for="kasur">Kasur</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="categories" value="Lemari" id="lemari">
                            <label class="form-check-label" for="lemari">Lemari</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="categories" value="Meja" id="meja">
                            <label class="form-check-label" for="meja">Meja</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="categories" value="Kursi" id="kursi">
                            <label class="form-check-label" for="kursi">Kursi</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="categories" value="AC" id="ac">
                            <label class="form-check-label" for="ac">AC</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="categories" value="Kipas Angin"
                                id="kipas">
                            <label class="form-check-label" for="kipas">Kipas Angin</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="categories" value="TV" id="tv">
                            <label class="form-check-label" for="tv">TV</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="categories" value="Jendela" id="jendela">
                            <label class="form-check-label" for="jendela">Jendela</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="categories" value="Gorden" id="gorden">
                            <label class="form-check-label" for="gorden">Gorden</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="categories" value="Colokan listrik"
                                id="colokan">
                            <label class="form-check-label" for="colokan">Colokan listrik</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="categories" value="Lampu"
                                id="lampu">
                            <label class="form-check-label" for="lampu">Lampu</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label>Gambar</label>
                <input type="file" name="image" class="form-control" accept="image/*">
            </div>

            <div class="d-grid gap-2">
                <button class="btn btn-success">Simpan</button>
                <a href="{{ route('admin.facilities.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
@endsection
