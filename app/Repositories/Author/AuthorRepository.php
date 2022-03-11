<?php

namespace App\Repositories\Author;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Helpers\QueryParamsHelper;
use Illuminate\Support\Collection;
use App\Repositories\BaseRepository;
use Yajra\DataTables\Facades\DataTables;

class AuthorRepository extends BaseRepository implements AuthorRepositoryInterface
{

    public function __construct(Author $author)
    {
        parent::__construct($author);
    }

    public function all(Request $request): Collection
    {
        $query = $this->model->query();

        if($request->has('name')){
            $query = $query->where('name', 'LIKE', "%" . $request->get('name') . "%");
        }

        if (QueryParamsHelper::checkIncludeParamDatatables()) {
            $result = Datatables::customizable($query)->response();

            return collect($result);
        }

        return $query->get();
    }
}
