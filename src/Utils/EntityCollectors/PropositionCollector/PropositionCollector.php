<?php

namespace App\Utils\EntityCollectors\PropositionCollector;

use App\Repository\Current\PropositionRepository\PropositionRepositoryInterface;

final class PropositionCollector implements PropositionCollectorInterface
{
    private PropositionRepositoryInterface $repository;

    public function __construct(PropositionRepositoryInterface $repository)
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
}
