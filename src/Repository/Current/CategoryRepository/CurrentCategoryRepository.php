<?php

namespace App\Repository\Current\CategoryRepository;

use App\Entity\Category;
use App\Repository\Current\AbstractRepository;
use App\Repository\Doctrine\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @property CategoryRepository $repository
 */
final class CurrentCategoryRepository extends AbstractRepository implements CategoryRepositoryInterface
{
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, Category::class);
    }

    public function findOne($id)
    {
        return $this->repository->find($id);
    }

    public function findAllActive()
    {
        return $this->repository->findAllActive();
    }

    public function findOneByName($name)
    {
        return $this->repository->findOneBy(['name' => $name]);
    }
}
