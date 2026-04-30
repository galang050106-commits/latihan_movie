<?php

namespace App\Services;

use App\Repositories\MovieRepository;

class MovieService
{
    protected $movieRepository;

    public function __construct(MovieRepository $movieRepository)
    {
        $this->movieRepository = $movieRepository;
    }

    public function getAllMovies($search = null)
    {
        return $this->movieRepository->getAll($search);
    }

    public function getMovieById($id)
    {
        return $this->movieRepository->findById($id);
    }

    public function createMovie($data)
    {
        return $this->movieRepository->store($data);
    }

    public function updateMovieById($id, $data)
    {
        return $this->movieRepository->updateById($id, $data);
    }

    public function deleteMovieById($id)
    {
        return $this->movieRepository->deleteById($id);
    }
}