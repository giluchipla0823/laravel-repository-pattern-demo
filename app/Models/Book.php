<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $table = 'books';

    protected $fillable = [
        'author_id',
        'publisher_id',
        'title',
        'summary',
        'description',
        'quantity',
        'price'
    ];

    public function author(){
        return $this->belongsTo(Author::class);
    }

    public function publisher(){
        return $this->belongsTo(Publisher::class);
    }

    public function genres(){
        return $this->belongsToMany(Genre::class, 'books_genres');
    }
}
