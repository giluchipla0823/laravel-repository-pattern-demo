<?php

namespace App\Services\Book;

use App\Repositories\Book\BookRepositoryInterface;

class BookService
{
    /**
     * @var BookRepositoryInterface
     */
    private $repository;

    public function __construct(BookRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
}
