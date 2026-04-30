<?php

namespace App\Services;

use App\Models\Movie;

class MovieService
{
    public function getAllMovies()
    {
        return Movie::latest()->get();
    }

    public function createMovie($data)
    {
        return Movie::create($data);
    }

    public function updateMovie($movie, $data)
    {
        return $movie->update($data);
    }

    public function deleteMovie($movie)
    {
        return $movie->delete();
    }
}