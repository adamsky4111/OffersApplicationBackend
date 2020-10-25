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
    protected ?BaseEntity $entity = null;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function setEntity($entity)
    {
        $this->entity = $entity;

        return $this;
    }

    public function create()
    {
        $this->em->persist($this->entity);
        $this->em->flush();
    }

    public function update()
    {
        $this->em->persist($this->entity);
        $this->em->flush();
    }

    public function delete()
    {
        $this->em->remove($this->entity);
        $this->em->flush();
    }

    public function dataIsSet()
    {
        if (null === $this->entity) {
            return false;
        }

        return true;
    }
}
