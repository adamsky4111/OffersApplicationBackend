<?php

namespace App\Utils;

use App\Entity\BaseEntity;
use Symfony\Component\Serializer\SerializerInterface;

abstract class AbstractEntitySerializer
{
    protected SerializerInterface $serializer;
    protected string $entityName;

    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    public function entitiesToJson(array $data)
    {
    }

    public function entityToJson(BaseEntity $data)
    {
    }

    public function jsonToEntity(string $data)
    {
    }
}
