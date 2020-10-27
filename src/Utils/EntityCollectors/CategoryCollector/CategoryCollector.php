<?php

namespace App\Utils\EntityCollectors\CategoryCollector;

use App\Repository\Current\CategoryRepository\CategoryRepositoryInterface;

class CategoryCollector implements CategoryCollectorInterface
{
    private CategoryRepositoryInterface $repository;

    public function __construct(CategoryRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getOne($id)
    {
        return $this->repository->findOne($id);
    }

    public function getAllActive()
    {
        return $this->repository->findAllActive();
    }

    public function getOneByName($name)
    {
        return $this->repository->findOneByName($name);
    }
}
