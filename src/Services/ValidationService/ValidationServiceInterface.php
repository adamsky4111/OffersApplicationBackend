<?php

namespace App\Services\ValidationService;

use App\Entity\BaseEntity;

interface ValidationServiceInterface
{
    public function validate(BaseEntity $entity);
}
