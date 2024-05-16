<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TagController;

Route::get('/', [JobController::class, 'index']);

Route::get('/jobs/view/{id}', [JobController::class, 'show']);
Route::get('/jobs/create', [JobController::class, 'create'])->middleware('auth');
Route::get('/jobs/all', [JobController::class, 'showAll']);
Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->middleware('auth');

Route::post('/jobs', [JobController::class, 'store'])->middleware('auth');
Route::patch('/jobs/{job}', [JobController::class, 'update'])->middleware('auth');
Route::delete('/jobs/view/{job}', [JobController::class, 'destroy'])->middleware('auth');

Route::get('/search', SearchController::class);
//For default search for Id added :name to search by param you select   
Route::get('/tags/{tag:name}', TagController::class);


Route::middleware('guest')->group(function () {

    Route::get('/register', [RegisteredUserController::class, 'create']);
    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::get('/login', [SessionController::class, 'create']);
    Route::post('/login', [SessionController::class, 'store']);
});
Route::post('/logout', [SessionController::class, 'destroy'])->middleware('auth');

//OR
//! FOR ALL
// Route::get('/register', [RegisteredUserController::class, 'create'])->middleware('guest'); 
