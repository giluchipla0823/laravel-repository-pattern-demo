<?php

namespace App\Repositories\Author;

use App\Models\Author;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class AuthorRepository extends BaseRepository implements AuthorRepositoryInterface
{
    public function __construct(Author $author)
    {
        parent::__construct($author);
    }

    public function all(Request $request): Collection
    {
        $query = $this->model;

        if($request->has('name')){
            $query = $query->where('name', 'LIKE', "%" . $request->get('name') . "%");
        }

        return $query->get();
    }
}
