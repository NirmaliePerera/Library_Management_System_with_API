<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    //
        public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }

    use HasFactory;

        // Add 'user_id' and any other fields you want to allow
        protected $fillable = [
            'user_id',
            'book_id',
            'borrow_date',
            'borrow_date',
            'status',
        ];
}
