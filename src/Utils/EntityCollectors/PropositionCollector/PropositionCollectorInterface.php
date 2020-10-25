<?php

namespace App\Utils\EntityCollectors\PropositionCollector;

use App\Repository\Current\PropositionRepository\PropositionRepositoryInterface;

interface PropositionCollectorInterface
{
    public function __construct(PropositionRepositoryInterface $repository);

    public function getOne($id);

    public function getAllActive();
}
