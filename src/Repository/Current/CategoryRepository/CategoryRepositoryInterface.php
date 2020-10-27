<?php

namespace App\Repository\Current\CategoryRepository;

use App\Entity\BaseEntity;

interface CategoryRepositoryInterface
{
    public function save(BaseEntity $entity);

    public function remove(BaseEntity $entity);

    public function findOne($id);

    public function findAllActive();

    public function findOneByName($name);
}