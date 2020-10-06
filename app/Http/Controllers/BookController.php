<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all()->toArray();
        return array_reverse($books);
    }

    public function add(Request $request)
    {
        $book = new Book([
            'title' => $request->input('title'),
            'author' => $request->input('author'),
            'publisher' => $request->input('publisher'),
            'year' => $request->input('year')
        ]);
        $book->save();

        return response()->json('The Book Successfully Added');
    }

    public function edit($id)
    {
        $book = Book::finf($id);
        return response()->json($book);
    }

    public function update($id, Request $request)
    {
        $book = Book::find($id);
        $book->update($request->all());

        return response()->jspn("Berhasil Mengupdate Bukuk");
    }

    public function delete($id)
    {
        $book = Book::find($id);
        $book->delet();

        return response()->json("Berhasil menghapus buku");
    }
}
