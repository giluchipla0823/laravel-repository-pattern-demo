<?php

namespace App\Http\Controllers\Api\V1\Author;

use Exception;
use App\Models\Author;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Services\Author\AuthorService;
use App\Http\Controllers\ApiController;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\Author\AuthorStoreRequest;
use App\Http\Requests\Author\AuthorUpdateRequest;

class AuthorController extends ApiController
{
    /**
     * @var AuthorService
     */
    private $authorService;

    public function __construct(
        AuthorService $authorService
    ) {
        $this->authorService = $authorService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return JsonResponse
     * @throws Exception
     */
    public function index(Request $request): JsonResponse {
        $authors = $this->authorService->all($request);

        return $this->showAll($authors);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AuthorStoreRequest $request
     * @return JsonResponse
     */
    public function store(AuthorStoreRequest $request): JsonResponse
    {
        $author = $this->authorService->create($request->all());

        return $this->successResponse($author, 'Author created successfully.', Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param Author $author
     * @return JsonResponse
     */
    public function show(Author $author): JsonResponse
    {
        return $this->showOne($author);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AuthorUpdateRequest $request
     * @param Author $author
     * @return JsonResponse
     */
    public function update(AuthorUpdateRequest $request, Author $author): JsonResponse
    {
        $author = $this->authorService->update($request->all(), $author->id);

        return $this->successResponse($author, 'Author updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Author $author
     * @return JsonResponse
     */
    public function destroy(Author $author): JsonResponse
    {
        $this->authorService->delete($author->id);

        return $this->showMessage('Author removed successfully.', Response::HTTP_NO_CONTENT);
    }

    /**
     * Enable the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function restore(int $id): JsonResponse
    {
        $this->authorService->restore($id);

        return $this->showMessage('Author restored successfully.');
    }
}
