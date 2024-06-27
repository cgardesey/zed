<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePyzBookRequest;
use App\Http\Requests\UpdatePyzBookRequest;
use App\Models\PyzBook;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

class PyzBookController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $bookData = $request->all();
            $book = new PyzBook($bookData);
            $book->save();

            return redirect('/');
        } catch (QueryException $e) {
            // Handle database exceptions
            return response()->json(['error' => 'Failed to store the book due to a database error.'], 500);
        } catch (\Exception $e) {
            // Log any unexpected exceptions
            info($e);

            return response()->json(['error' => 'Failed to store the book.'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $book = PyzBook::findOrFail($id);

            return [
                'book' => $book,
            ];
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Book not found.'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to retrieve the book.'], 500);
        }
    }

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
            info($e);
            return response()->json(['error' => 'Failed to retrieve books.'], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PyzBook $pyzBook)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            // Add other fields validation rules as necessary
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $bookData = $request->all();
            $pyzBook->fill($bookData);
            $pyzBook->save();

            return redirect('/');
        } catch (QueryException $e) {
            // Handle database exceptions
            return response()->json(['error' => 'Failed to update the book due to a database error.'], 500);
        } catch (\Exception $e) {
            // Handle any unexpected exceptions
            info($e);
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
            info($e);
            return response()->json(['error' => 'Failed to delete the book.'], 500);
        }
    }
}
