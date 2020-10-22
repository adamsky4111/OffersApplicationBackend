<?php

namespace App\Repository\Current\OfferRepository;

use App\Entity\BaseEntity;

interface OfferRepositoryInterface
{
    public function save(BaseEntity $entity);

    public function remove(BaseEntity $entity);

    public function findOne($id);

    public function findAllActive();

    public function findAllEnded();

    public function findAllDeleted();
}
