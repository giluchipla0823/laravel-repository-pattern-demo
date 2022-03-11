<?php

namespace App\Models;

use App\Http\Resources\Author\AuthorResource;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Author extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $table = 'authors';

    protected $fillable = [
        'name'
    ];

    public $transformer = AuthorResource::class;

    /**
     * @return HasMany
     */
    public function books(): HasMany {
        return $this->hasMany(Book::class);
    }
}


