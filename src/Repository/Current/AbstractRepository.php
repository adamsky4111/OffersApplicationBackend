<?php

namespace App\Repository\Current;

use App\Entity\BaseEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class AbstractRepository.
 *
 * @author Adam Dziegielewski
 *
 * This is Abstract repository, EntityCollectors in Utils uses this
 * Repository to get data from database
 * Every repository should extend this, and to prevent multiple
 * implementation should be Final
 */
class AbstractRepository
{
    protected ServiceEntityRepository $repository;
    protected EntityManagerInterface $em;

    // in the inheriting class we should use parrent:__contruct($em, Product:class)
    // so we dont need to config services.yml to pass classname argument
    // constructor in inheriting class should has only one parameter - EntityManagerInterface
    public function __construct(EntityManagerInterface $em, $entityName)
    {
        $this->repository = $em->getRepository($entityName);
        $this->em = $em;
    }

    public function save(BaseEntity $entity): void
    {
        $this->em->persist($entity);
        $this->em->flush();
    }

    public function remove(BaseEntity $entity): void
    {
        $this->em->remove($entity);
        $this->em->flush();
    }
}
