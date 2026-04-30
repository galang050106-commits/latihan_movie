<?php

use App\Http\Controllers\MovieController;

Route::get('/', [MovieController::class, 'index']);

// DATA
Route::get('/movies/data', [MovieController::class, 'index'])->name('movies.data');

// DETAIL
Route::get('/movie/{id}', [MovieController::class, 'detail'])->name('movies.detail');

// CREATE
Route::get('/movies/create', [MovieController::class, 'create']);
Route::post('/movies/store', [MovieController::class, 'store']);

// EDIT
Route::get('/movies/edit/{id}', [MovieController::class, 'form_edit']);
Route::put('/movies/update/{id}', [MovieController::class, 'update'])->name('movies.update');

// DELETE (FIX ERROR DELETE)
Route::delete('/movies/delete/{id}', [MovieController::class, 'delete'])->name('movies.delete');