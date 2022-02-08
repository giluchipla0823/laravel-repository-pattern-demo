<?php

namespace App\Services\Publisher;

use App\Repositories\Publisher\PublisherRepositoryInterface;

class PublisherService
{
    /**
     * @var PublisherRepositoryInterface
     */
    private $repository;

    public function __construct(PublisherRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
}
