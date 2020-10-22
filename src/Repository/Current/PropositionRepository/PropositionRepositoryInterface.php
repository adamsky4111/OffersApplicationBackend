<?php

namespace App\Repository\Current\PropositionRepository;

interface PropositionRepositoryInterface
{
    public function getOne($id);

    public function getAllActive();
}
