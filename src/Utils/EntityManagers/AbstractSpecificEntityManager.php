<?php

namespace App\Utils\EntityManagers;

use App\Entity\BaseEntity;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class AbstractSpecificEntityManager
 * This is class for generic actions in extended managers
 * every entity specific manager in project should extend this class
 * methods can be rewrite if u want to for instance: do not physical
 * delete entities.
 */
abstract class AbstractSpecificEntityManager
{
    protected EntityManagerInterface $em;


    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function create(BaseEntity $entity)
    {
        $this->em->persist($entity);
        $this->em->flush();
    }

    public function update(BaseEntity $entity)
    {
        $this->em->persist($entity);
        $this->em->flush();
    }

    public function delete(BaseEntity $category)
    {
        $this->em->remove($category);
        $this->em->flush();
    }
}
