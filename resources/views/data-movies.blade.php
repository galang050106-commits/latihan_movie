@extends('layout.template')

@section('title', 'Data Movie')

@section('content')

<h1 class="mb-3">Data Movie</h1>

<a href="{{ url('/movies/create') }}" class="btn btn-primary mb-3">Tambah Movie</a>

<table class="table table-hover table-bordered">
    <thead class="table-success">
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Tahun</th>
            <th>Pemain</th>
            <th class="text-center">Aksi</th>
        </tr>
    </thead>

    <tbody>
        @forelse ($movies as $movie)
        <tr>
            {{-- FIX: nomor pagination biar tidak reset --}}
            <td>{{ ($movies->currentPage() - 1) * $movies->perPage() + $loop->iteration }}</td>

            <td>{{ $movie->judul }}</td>
            <td>{{ $movie->category->nama_kategori ?? '-' }}</td>
            <td>{{ $movie->tahun }}</td>
            <td>{{ $movie->pemain }}</td>

            <td class="text-nowrap text-center">

                {{-- Edit --}}
                <a href="{{ url('/movies/edit/'.$movie->id) }}" class="btn btn-warning btn-sm">
                    Edit
                </a>

                {{-- Delete --}}
                <form action="{{ route('movies.delete', $movie->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm('Yakin hapus data ini?')">
                        Hapus
                    </button>
                </form>

            </td>
        </tr>

        @empty
        <tr>
            <td colspan="6" class="text-center">Data tidak ditemukan</td>
        </tr>
        @endforelse
    </tbody>
</table>

{{-- Pagination --}}
<div class="d-flex justify-content-center">
    {{ $movies->links() }}
</div>

@endsection