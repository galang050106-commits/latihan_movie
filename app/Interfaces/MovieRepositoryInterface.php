<?php

namespace App\Interfaces;

interface MovieRepositoryInterface
{
    public function getAll($search = null);
    public function store($data);
    public function updateById($id, $data);
    public function deleteById($id);
}