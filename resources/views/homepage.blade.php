@extends('layout.template')

@section('title', 'Homepage')

@section('content')

{{-- Alert sukses --}}
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<h1 class="mb-4">Popular Movie</h1>

<div class="row">

    @forelse ($movies as $movie)
    <div class="col-lg-6">
        <div class="card mb-3 shadow-sm">

            <div class="row g-0">

                {{-- Gambar --}}
                <div class="col-md-4">
                    <img src="/images/{{ $movie->foto_sampul }}" 
                         class="img-fluid rounded-start" 
                         alt="{{ $movie->judul }}">
                </div>

                {{-- Konten --}}
                <div class="col-md-8">
                    <div class="card-body">

                        <h5 class="card-title">{{ $movie->judul }}</h5>

                        <p class="card-text">
                            {{ Str::limit($movie->sinopsis, 100) }}
                        </p>

                        <a href="/movie/{{ $movie->id }}" 
                           class="btn btn-success btn-sm">
                            Lihat Selanjutnya
                        </a>

                    </div>
                </div>

            </div>

        </div>
    </div>

    @empty
    <div class="col-12">
        <p class="text-center">Data movie belum tersedia</p>
    </div>
    @endforelse

</div>

{{-- Pagination --}}
<div class="d-flex justify-content-center">
    {{ $movies->links() }}
</div>

@endsection