<?php

namespace App\Repositories;

use App\Models\Movie;
use App\Interfaces\MovieRepositoryInterface;

class MovieRepository implements MovieRepositoryInterface
{
    // =========================
    // GET ALL + SEARCH + PAGINATION
    // =========================
    public function getAll($search = null)
    {
        $query = Movie::with('category')->latest();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', '%' . $search . '%')
                  ->orWhere('sinopsis', 'like', '%' . $search . '%');
            });
        }

        return $query->paginate(6)->withQueryString();
    }

    // =========================
    // GET BY ID
    // =========================
    public function findById($id)
    {
        return Movie::with('category')->findOrFail($id);
    }

    // =========================
    // STORE
    // =========================
    public function store($data)
    {
        return Movie::create($data);
    }

    // =========================
    // UPDATE
    // =========================
    public function updateById($id, $data)
    {
        $movie = Movie::findOrFail($id);
        $movie->update($data);

        return $movie;
    }

    // =========================
    // DELETE
    // =========================
    public function deleteById($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();

        return true;
    }
}