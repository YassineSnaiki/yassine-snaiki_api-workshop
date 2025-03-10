<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function index() {
        return response()->json(Book::all());
    }

    public function store(Request $request) {
        $book = Book::create($request->validate([
            'title' => 'required|string|max:255'
        ]));
        return response()->json($book, 201);
    }

    public function show(Book $book) {
        return response()->json($book);
    }


    public function update(Request $request, Book $book) {
        $book->update($request->validate([
            'title' => 'required|string|max:255'
        ]));
        return response()->json($book);
    }

    public function destroy(Book $book) {
        $book->delete();
        return response()->json(null, 204);
    }

}
