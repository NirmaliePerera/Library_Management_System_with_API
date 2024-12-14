<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Borrow;


class BorrowController extends Controller
{
    public function index()
    {
        // Fetch only available books
        $books = Book::where('availability_status', 'available')->get();
    
        return view('books.borrow', compact('books'));
    }

    public function borrowedBooks()
    {
        // borrowed books fetched for the logged-in user
        $borrowedBooks = Borrow::with('book')
            ->where('user_id', auth()->id()) // Only for the logged-in user
            ->get();

        return view('borrow.borrowed-books', compact('borrowedBooks'));
    }


        public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
        ]);

        //book found
        $book = Book::find($request->book_id);

        // Book is borrowed already
        if ($book->availability_status !== 'available') {
            return redirect()->back()->with('error', 'Book is unavailable.');
        }
        //Borrow record created
        Borrow::create([
            'user_id' => auth()->id(),
            'book_id' => $request->book_id,
            'borrow_date' => now(),
            'status' => 'borrowed',
        ]);

        // Update book availability
        $book->update(['availability_status' => 'unavailable']);

        return redirect()->back()->with('success', 'Book borrowed successfully.');
    }

    public function returnBook(Request $request, Book $book)
{
    // borrowed book or not
    if ($book->availability_status === 'unavailable') {
        // borrow record of the book
        $borrow = Borrow::where('book_id', $book->id)
                        ->where('status', 'borrowed')
                        ->first();

        if ($borrow) {
            //borrow status updated
            $borrow->update(['status' => 'returned']);

            // book availability updated
            $book->update(['availability_status' => 'available']);
        }
    }

    return redirect()->back()->with('success', 'Book marked as returned.');
}


}
