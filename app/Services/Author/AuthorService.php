<?php

namespace App\Services\Author;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
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

//    public function all(Request $request): Collection
//    {
//        $resource = AuthorResource::collection($this->repository->all($request));
//
//        return new Collection($resource->toArray($request));
//    }

    public function all(Request $request): array
    {
        $results = $this->repository->all($request);

        $resource = AuthorResource::collection($results);

        return $resource->toArray($request);
    }

    public function create(array $params): Model
    {
        return $this->repository->create($params);
    }

    public function delete(int $id)
    {
        return $this->repository->delete($id);
    }

    public function update(array $params, int $id): ?int
    {
        return $this->repository->update($params, $id);
    }

    public function restore(int $id)
    {
        return $this->repository->restore($id);
    }
}
