<?php

namespace App\Services\Author;

use App\Models\Author;
use Illuminate\Database\Eloquent\Casts\ArrayObject;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Helpers\QueryParamsHelper;
use App\Http\Resources\Author\AuthorResource;
use App\Repositories\Author\AuthorRepositoryInterface;

class AuthorService
{
    /**
     * @var AuthorRepositoryInterface
     */
    private $repository;

    public function __construct(AuthorRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param Request $request
     * @return array
     */
    public function all(Request $request)
    {
        return $this->repository->all($request);
    }

    public function findById(int $id): array {
        return $this->repository->find($id);
    }

    /**
     * @param array $params
     * @return Author
     */
    public function create(array $params): Author
    {
        return $this->repository->create($params);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function delete(int $id)
    {
        return $this->repository->delete($id);
    }

    /**
     * @param array $params
     * @param int $id
     * @return Author
     */
    public function update(array $params, int $id): Author
    {
        $this->repository->update($params, $id);

        return $this->findById($id);
    }

    /**
     * @param int $id
     * @return bool|null
     */
    public function restore(int $id)
    {
        return $this->repository->restore($id);
    }
}
