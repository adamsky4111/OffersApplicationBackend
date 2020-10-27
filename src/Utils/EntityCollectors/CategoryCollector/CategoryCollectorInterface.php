<?php

namespace App\Utils\EntityCollectors\CategoryCollector;

use App\Repository\Current\CategoryRepository\CategoryRepositoryInterface;

interface CategoryCollectorInterface
{
    public function __construct(CategoryRepositoryInterface $repository);

    public function getOne($id);

    public function getOneByName($name);

    public function getAllActive();
}
