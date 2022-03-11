<?php

namespace App\Http\Resources\Author;

use Illuminate\Http\Request;
use App\Http\Resources\Book\BookResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AuthorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        $relationships = array_keys($this->resource->getRelations());

        $response = [
            'id' => $this->id,
            'name' => $this->name,
            'active' => $this->active,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ];

        if (in_array('books', $relationships)) {
            $response['books'] = $this->includeBooks();
        }

        return $response;
    }

    /**
     * @return AnonymousResourceCollection
     */
    protected function includeBooks(): AnonymousResourceCollection {
        return BookResource::collection($this->books);
    }
}
