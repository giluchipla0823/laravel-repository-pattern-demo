<?php

namespace App\Models;

use App\Http\Resources\Author\AuthorResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'authors';

    public $transformer = AuthorResource::class;

    protected $fillable = [
        'name'
    ];

    /**
     * @return HasMany
     */
    public function books(): HasMany {
        return $this->hasMany(Book::class);
    }
}


