<?php

namespace App\Utils;

use App\Entity\BaseEntity;

interface EntitySerializerInterface
{
    public function entitiesToJson(array $data);

    public function entityToJson(BaseEntity $data);

    public function jsonToEntity(string $data);
}
