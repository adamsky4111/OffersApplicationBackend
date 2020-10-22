<?php

namespace App\Utils\EntityCollectors\OfferCollector;

use App\Repository\Current\OfferRepository\OfferRepositoryInterface;

class OfferCollector implements OfferCollectorInterface
{
    protected OfferRepositoryInterface $repository;

    public function __construct(OfferRepositoryInterface $repository)
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

    public function getAllEnded()
    {
        return $this->repository->findAllEnded();
    }

    public function getAllDeleted()
    {
        return $this->repository->findAllDeleted();
    }
}
