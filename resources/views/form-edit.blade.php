@extends('layout.template')

@section('title', 'Edit Movie')

@section('content')

<h2 class="mb-4">Edit Movie</h2>

<form action="{{ route('movies.update', $movie->id) }}" method="POST" enctype="multipart/form-data">
    
    @csrf
    @method('PUT')

    {{-- ID (tidak perlu dikirim) --}}
    <div class="mb-3">
        <label class="form-label">ID Film:</label>
        <input type="text" class="form-control" value="{{ $movie->id }}" disabled>
    </div>

    {{-- Judul --}}
    <div class="mb-3">
        <label class="form-label">Judul:</label>
        <input type="text" class="form-control" name="judul" value="{{ $movie->judul }}" required>
    </div>

    {{-- Kategori --}}
    <div class="mb-3">
        <label class="form-label">Kategori:</label>
        <select name="category_id" class="form-select" required>
            <option value="">Pilih Kategori</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                    {{ $movie->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->nama_kategori }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- Sinopsis --}}
    <div class="mb-3">
        <label class="form-label">Sinopsis:</label>
        <textarea class="form-control" name="sinopsis" rows="4" required>{{ $movie->sinopsis }}</textarea>
    </div>

    {{-- Tahun --}}
    <div class="mb-3">
        <label class="form-label">Tahun:</label>
        <input type="number" class="form-control" name="tahun" value="{{ $movie->tahun }}" required>
    </div>

    {{-- Pemain --}}
    <div class="mb-3">
        <label class="form-label">Pemain:</label>
        <input type="text" class="form-control" name="pemain" value="{{ $movie->pemain }}" required>
    </div>

    {{-- Foto lama --}}
    <div class="mb-3">
        <label class="form-label">Foto Sebelumnya:</label><br>
        <img src="/images/{{ $movie->foto_sampul }}" 
             class="img-thumbnail" 
             width="120">
    </div>

    {{-- Upload baru --}}
    <div class="mb-3">
        <label class="form-label">Foto Sampul:</label>
        <input type="file" class="form-control" name="foto_sampul">
    </div>

    {{-- Button --}}
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="/" class="btn btn-secondary">Kembali</a>
    </div>

</form>

@endsection