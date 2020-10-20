<?php

namespace App\Utils;

use App\Entity\BaseEntity;
use App\Entity\Category;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

class CategorySerializer extends AbstractEntitySerializer
{
    public function __construct(SerializerInterface $serializer)
    {
        parent::__construct($serializer, Category::class);
    }

    public function entitiesToJson(array $data)
    {
        if (!($data[0] instanceof $this->entityName)) {
            return;
        }

        return $this->serializer->serialize($data, 'json', ['groups' => ['list_category', 'ids']]);
    }

    public function entityToJson(BaseEntity $data)
    {
        if (!($data instanceof $this->entityName)) {
            return;
        }

        return $this->serializer->serialize($data, $this->format, ['groups' => ['show_category', 'ids']]);
    }

    public function jsonToEntity(string $data)
    {
        return $this->serializer->deserialize(
            $data,
            $this->entityName,
            $this->format,
            [AbstractNormalizer::ALLOW_EXTRA_ATTRIBUTES => false]
        );
    }
}
