<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePyzBookRequest;
use App\Http\Requests\UpdatePyzBookRequest;
use App\Models\PyzBook;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;

class PyzBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $books = PyzBook::all();

            return [
                'books' => $books,
            ];
        } catch (\Exception $e) {
            // Handle any unexpected exceptions
            // For example, log the error or return an error response
            return response()->json(['error' => 'Failed to retrieve books.'], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            return $this->viewResponse('book.create');
        } catch (\Exception $e) {
            // Handle any unexpected exceptions
            // For example, log the error or return an error response
            return response()->json(['error' => 'Failed to load create form.'], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $bookData = $request->all();
            $book = new PyzBook($bookData);
            $book->save();

            return redirect('/');
        } catch (\Exception $e) {
            // Handle any unexpected exceptions
            // For example, log the error or return an error response
            return response()->json(['error' => 'Failed to store the book.'], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PyzBook $pyzBook)
    {
        try {
            $bookData = $request->all();
            $pyzBook->fill($bookData);
            $pyzBook->save();

            return redirect('/');
        } catch (\Exception $e) {
            // Handle any unexpected exceptions
            // For example, log the error or return an error response
            return response()->json(['error' => 'Failed to update the book.'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PyzBook $pyzBook)
    {
        try {
            $pyzBook->delete();

            return redirect('/');
        } catch (\Exception $e) {
            // Handle any unexpected exceptions
            // For example, log the error or return an error response
            return response()->json(['error' => 'Failed to delete the book.'], 500);
        }
    }
}
