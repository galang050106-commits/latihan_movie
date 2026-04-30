<?php

namespace App\Http\Controllers;

use App\Services\MovieService;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreMovieRequest;

class MovieController extends Controller
{
    protected $movieService;

    public function __construct(MovieService $movieService)
    {
        $this->movieService = $movieService;
    }

    // =========================
    // LIST DATA (PAGINATION FIX)
    // =========================
    public function index()
    {
        $movies = $this->movieService->getAllMovies(request('search'));
        return view('data-movies', compact('movies'));
    }

    // =========================
    // DETAIL
    // =========================
    public function detail($id)
    {
        $movie = $this->movieService->getMovieById($id);
        return view('detail', compact('movie'));
    }

    // =========================
    // FORM INPUT
    // =========================
    public function create()
    {
        $categories = Category::all();
        return view('input', compact('categories'));
    }

    // =========================
    // STORE
    // =========================
    public function store(StoreMovieRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('foto_sampul')) {
            $file = $request->file('foto_sampul');
            $fileName = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $fileName);

            $data['foto_sampul'] = $fileName;
        }

        $this->movieService->createMovie($data);

        return redirect('/')->with('success', 'Film berhasil ditambahkan.');
    }

    // =========================
    // FORM EDIT
    // =========================
    public function form_edit($id)
    {
        $movie = $this->movieService->getMovieById($id);
        $categories = Category::all();

        return view('form-edit', compact('movie', 'categories'));
    }

    // =========================
    // UPDATE
    // =========================
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'sinopsis' => 'required|string',
            'tahun' => 'required|integer',
            'pemain' => 'required|string',
            'foto_sampul' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('foto_sampul')) {
            $file = $request->file('foto_sampul');
            $fileName = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $fileName);

            $data['foto_sampul'] = $fileName;
        }

        $this->movieService->updateMovieById($id, $data);

        return redirect('/movies/data')->with('success', 'Data berhasil diperbarui');
    }

    // =========================
    // DELETE
    // =========================
    public function delete($id)
    {
        $movie = $this->movieService->getMovieById($id);

        if ($movie->foto_sampul && File::exists(public_path('images/' . $movie->foto_sampul))) {
            File::delete(public_path('images/' . $movie->foto_sampul));
        }

        $this->movieService->deleteMovieById($id);

        return redirect('/movies/data')->with('success', 'Data berhasil dihapus');
    }
}