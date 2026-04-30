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

    // =========================
    // GET ALL + SEARCH + PAGINATION
    // =========================
    public function getAllMovies($search = null)
    {
        return $this->movieRepository->getAll($search);
    }

    // =========================
    // GET BY ID
    // =========================
    public function getMovieById($id)
    {
        return $this->movieRepository->findById($id);
    }

    // =========================
    // STORE
    // =========================
    public function createMovie($data)
    {
        return $this->movieRepository->store($data);
    }

    // =========================
    // UPDATE
    // =========================
    public function updateMovieById($id, $data)
    {
        return $this->movieRepository->updateById($id, $data);
    }

    // =========================
    // DELETE
    // =========================
    public function deleteMovieById($id)
    {
        return $this->movieRepository->deleteById($id);
    }
}