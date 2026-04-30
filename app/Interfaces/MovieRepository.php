<?php

namespace App\Repositories;

use App\Models\Movie;
use App\Interfaces\MovieRepositoryInterface;

class MovieRepository implements MovieRepositoryInterface
{
    // =========================
    // GET ALL + SEARCH
    // =========================
    public function getAll($search = null)
    {
        $query = Movie::with('category')->latest();

        if ($search) {
            $query->where('judul', 'like', '%' . $search . '%')
                  ->orWhere('sinopsis', 'like', '%' . $search . '%');
        }

        return $query->paginate(6);
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
        return $movie->update($data);
    }

    // =========================
    // DELETE
    // =========================
    public function deleteById($id)
    {
        $movie = Movie::findOrFail($id);
        return $movie->delete();
    }
}