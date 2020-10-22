<?php

namespace App\Repository\Current\PropositionRepository;

use App\Entity\BaseEntity;

interface PropositionRepositoryInterface
{
    public function save(BaseEntity $entity);

    public function remove(BaseEntity $entity);

    public function findOne($id);

    public function findAllActive();
}
