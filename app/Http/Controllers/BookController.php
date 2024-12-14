<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();   /**get all employees from db -> before view */
        return view('books.index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data =$request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'published_date' => 'required|date',
            'genre' => 'required|in:fiction,nonfiction,literary_genres,science_fiction,fantacy,horror,children_clasic,children_clasic',
            //'availability_status' => 'required|in:available,unavailable',
        ]);

        $newBook = new Book();
        $newBook->title = $data['title'];
        $newBook->author = $data['author'];
        $newBook->published_date = $data['published_date'];
        $newBook->genre = $data['genre'];
        //$newBook->availability_status = $data['availability_status'];
    
        $newBook->save();   //storing data into db

        return redirect(route('book.index'))->with('success','Book added successfully'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('books.edit', ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Book $book, Request $request )
    {
        $data =$request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'published_date' => 'required|date',
            'genre' => 'required|in:fiction,nonfiction,literary_genres,science_fiction,fantacy,horror,children_clasic,children_clasic',
            'availability_status' => 'required|in:available,unavailable',
        ]);

        $book->title = $data['title'];
        $book->author = $data['author'];
        $book->published_date = $data['published_date'];
        $book->genre = $data['genre'];
        $book->availability_status = $data['availability_status'];
    
        $book->save();   //storing data into db

        return redirect(route('book.index'))->with('success','Details updated successfully'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect(route('book.index'))->with('success','Book removed successfully');
    }
}
