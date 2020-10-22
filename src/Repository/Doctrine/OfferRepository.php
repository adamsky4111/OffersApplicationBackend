<?php

namespace App\Repository\Doctrine;

use App\Entity\Offer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Offer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Offer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Offer[]    findAll()
 * @method Offer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OfferRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Offer::class);
    }

    public function findAllActive()
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.isPublished = :val')
            ->setParameter('val', true)
            ->orderBy('o.id', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findAllEnded()
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.isEnded = :val')
            ->setParameter('val', true)
            ->orderBy('o.id', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findAllDeleted()
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.isDeleted = :val')
            ->orderBy('o.id', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
