<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\CursoController;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
  return view('dashboard');
})->name('dashboard');


// Rotas para gerenciar cursos
Route::resource('cursos', CursoController::class);
Route::get('/admin/cursos/create', [CursoController::class, 'create'])->name('cursos.create');

// Rotas para gerenciar alunos
Route::resource('alunos', AlunoController::class);
