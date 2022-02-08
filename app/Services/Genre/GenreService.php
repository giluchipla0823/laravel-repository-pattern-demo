<?php

namespace App\Services\Genre;

use App\Repositories\Genre\GenreRepositoryInterface;

class GenreService
{
    /**
     * @var GenreRepositoryInterface
     */
    private $repository;

    public function __construct(GenreRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
}
