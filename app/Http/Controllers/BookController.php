<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{

    public function index()
    {
        $books = Book::all();
        return response()->json($books);
    }

    public function store(Request $request)
    {
        //validate the user input
        $this->validate($request, [
            "title" => "required",
            "author" => "required"
        ]);

        //add it to the databse

        $book = new Book();
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->save();

        return response()->json($book);
    }

    public function show($id)
    {
        $books = Book::find($id);
        return response()->json($books);
    }

    public function update(Request $request, $id)
    {
        //validate the user input
        $this->validate($request, [
            "title" => "required",
            "author" => "required"
        ]);

        //add it to the databse

        $book = Book::find($id);
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->save();

        return response()->json($book);
    }

    public function destroy($id)
    {
        $books = Book::find($id);
        $books->delete();
        return response()->json("Book has been deleted");
    }
}
