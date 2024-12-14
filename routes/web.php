<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//admin dashboard
/*route::get('admin/dashboard', [HomeController::class, 'index'])
->middleware(['auth', 'admin']);
//reader dashboard
route::get('reader/dashboard', [HomeController::class, 'readerIndex'])
    ->middleware(['auth', 'reader']);

//admin's routes
Route::get('/book', [BookController::class, 'index'])->name('book.index');
Route::get('/book/create', [BookController::class, 'create'])->name('book.create');
Route::post('/book', [BookController::class, 'store'])->name('book.store');
Route::get('/book/{book}/edit', [BookController::class, 'edit'])->name('book.edit');
Route::put('/book/{book}/update', [BookController::class, 'update'])->name('book.update');
Route::delete('/book/{book}/destroy', [BookController::class, 'destroy'])->name('book.destroy');

Route::post('/borrow/{borrow}/return', [BorrowController::class, 'return'])->name('borrow.return');
Route::post('/borrow/return/{book}', [BorrowController::class, 'returnBook'])->name('borrow.return');

//reader's routes
Route::get('/borrow', [BorrowController::class, 'index'])->name('borrow.index')->middleware('auth');
Route::post('/borrow', [BorrowController::class, 'store'])->name('borrow.store')->middleware('auth');
Route::get('/borrowed-books', [BorrowController::class, 'borrowedBooks'])
    ->middleware(['auth'])
    ->name('borrow.borrowedBooks');
*/
    

Route::middleware(['auth', 'admin'])->group(function () {
    // Admin Dashboard
    Route::get('admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');

    // Book Management
    Route::get('/book', [BookController::class, 'index'])->name('book.index');
    Route::get('/book/create', [BookController::class, 'create'])->name('book.create');
    Route::post('/book', [BookController::class, 'store'])->name('book.store');
    Route::get('/book/{book}/edit', [BookController::class, 'edit'])->name('book.edit');
    Route::put('/book/{book}/update', [BookController::class, 'update'])->name('book.update');
    Route::delete('/book/{book}/destroy', [BookController::class, 'destroy'])->name('book.destroy');

    // Borrow Management
    //Route::post('/borrow/{borrow}/return', [BorrowController::class, 'return'])->name('borrow.return');
    Route::post('/borrow/return/{book}', [BorrowController::class, 'returnBook'])->name('borrow.returnBook');
});

// Reader Routes
Route::middleware(['auth', 'reader'])->group(function () {
    // Reader Dashboard
    Route::get('reader/dashboard', [HomeController::class, 'readerIndex'])->name('reader.dashboard');

    // Borrowing Books
    Route::get('/borrow', [BorrowController::class, 'index'])->name('borrow.index');
    Route::post('/borrow', [BorrowController::class, 'store'])->name('borrow.store');
    Route::get('/borrowed-books', [BorrowController::class, 'borrowedBooks'])->name('borrow.borrowedBooks');
});






