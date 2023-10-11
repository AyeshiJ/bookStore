<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IssuedBook extends Model
{
    protected $table = 'issued_books'; // Specify the table name if it's different

    protected $fillable = ['user_id', 'book_id', 'issue_date', 'return_date', 'other_columns'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // Assuming 'user_id' is the foreign key
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id'); // Assuming 'book_id' is the foreign key
    }
}
