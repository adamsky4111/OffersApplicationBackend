<?php

namespace App\Repository\Current\PropositionRepository;

use App\Entity\Proposition;
use App\Repository\Current\AbstractRepository;
use App\Repository\Doctrine\PropositionRepository;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @property PropositionRepository $repository
 */
final class CurrentPropositionRepository extends AbstractRepository implements PropositionRepositoryInterface
{
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, Proposition::class);
    }

    public function getOne($id)
    {
        return $this->repository->find($id);
    }

    public function getAllActive()
    {
        return $this->repository->findAllActive();
    }
}
