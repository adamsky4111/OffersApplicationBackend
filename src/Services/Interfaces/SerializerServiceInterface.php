<?php

namespace App\Services\Interfaces;

use App\Entity\BaseEntity;
use Symfony\Component\Serializer\SerializerInterface;

interface SerializerServiceInterface
{
    public function __construct(SerializerInterface $serializer);

    public function serializeList(array $data);

    public function serializeObject(BaseEntity $data);

    public function deserializeObject(string $data, $entityName);
}