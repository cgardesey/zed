<?php

use App\Http\Controllers\PyzBookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route to create a new book
Route::post('/book/create', [PyzBookController::class, 'store'])->name('book.store');

// Route to display a specific book's details
Route::get('/book/{id}', [PyzBookController::class, 'show'])->name('book.show');

// Route to display the list of books
Route::get('/', [PyzBookController::class, 'index'])->name('book.index');

// Route to update an existing book
Route::post('/book/{pyzBook}/edit', [PyzBookController::class, 'update'])->name('book.update');

// Route to handle the deletion of a book
Route::delete('/book/{pyzBook}', [PyzBookController::class, 'destroy'])->name('book.delete');
