@extends('layout.template')

@section('title', 'Input Data Movie')

@section('content')

<a href="/movies/data" class="btn btn-secondary mt-3 mb-3">Kembali ke List</a>

<h2 class="mb-4">Tambah Movie Baru</h2>

<form action="/movies/store" method="POST" enctype="multipart/form-data">
    @csrf

    {{-- Judul --}}
    <div class="mb-3">
        <label class="form-label">Judul:</label>
        <input type="text" class="form-control" name="judul" required>
    </div>

    {{-- Kategori --}}
    <div class="mb-3">
        <label class="form-label">Kategori:</label>
        <select name="category_id" class="form-select" required>
            <option value="">Pilih Kategori</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">
                    {{ $category->nama_kategori }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- Sinopsis --}}
    <div class="mb-3">
        <label class="form-label">Sinopsis:</label>
        <textarea class="form-control" name="sinopsis" rows="4" required></textarea>
    </div>

    {{-- Tahun --}}
    <div class="mb-3">
        <label class="form-label">Tahun:</label>
        <input type="number" class="form-control" name="tahun" required>
    </div>

    {{-- Pemain --}}
    <div class="mb-3">
        <label class="form-label">Pemain:</label>
        <input type="text" class="form-control" name="pemain" required>
    </div>

    {{-- Foto --}}
    <div class="mb-3">
        <label class="form-label">Foto Sampul:</label>
        <input type="file" class="form-control" name="foto_sampul" required>
    </div>

    {{-- Button --}}
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="/movies/data" class="btn btn-outline-secondary">Batal</a>
    </div>

</form>

@endsection