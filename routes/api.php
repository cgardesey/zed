<?php

use App\Http\Controllers\PyzBookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', [PyzBookController::class, 'index'])->name('book.index');

// Route to display the form for creating a new book
Route::get('/book/create', [PyzBookController::class, 'create'])->name('book.create');

// Route to handle the form submission to create a new book
Route::post('/book/create', [PyzBookController::class, 'store'])->name('book.store');

// Route to display the form for editing an existing book
Route::get('/book/{pyzBook}/edit', [PyzBookController::class, 'edit'])->name('book.edit');

// Route to handle the form submission to update an existing book
Route::post('/book/{pyzBook}/edit', [PyzBookController::class, 'update'])->name('book.update');

// Route to handle the deletion of a book
Route::delete('/book/{pyzBook}', [PyzBookController::class, 'destroy'])->name('book.delete');
