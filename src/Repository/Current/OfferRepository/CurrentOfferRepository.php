<?php

namespace App\Repository\Current\OfferRepository;

use App\Entity\Offer;
use App\Repository\Current\AbstractRepository;
use App\Repository\Doctrine\OfferRepository;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @property OfferRepository $repository
 */
final class CurrentOfferRepository extends AbstractRepository implements OfferRepositoryInterface
{
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, Offer::class);
    }

    public function findOne($id)
    {
        return $this->repository->find($id);
    }

    public function findAllActive()
    {
        return $this->repository->findAllActive();
    }

    public function findAllEnded()
    {
        return $this->repository->findAllEnded();
    }

    public function findAllDeleted()
    {
        return $this->repository->findAllDeleted();
    }
}
