<?php

namespace App\Utils;

use App\Entity\BaseEntity;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

abstract class AbstractEntitySerializer implements EntitySerializerInterface
{
    protected SerializerInterface $serializer;
    protected string $entityName;
    protected string $format = 'json';
    protected string $serializationGroupsPrefix = '';

    public function __construct(SerializerInterface $serializer, $entityName, string $serializationGroupsPrefix)
    {
        $this->serializer = $serializer;
        $this->entityName = $entityName;
        $this->serializationGroupsPrefix = $serializationGroupsPrefix;
    }

    public function entitiesToJson(array $data)
    {
        if (!($data[0] instanceof $this->entityName)) {
            return;
        }

        return $this->serializer->serialize($data, 'json', ['groups' => 'list_'.$this->serializationGroupsPrefix]);
    }

    public function entityToJson(BaseEntity $data)
    {
        if (!($data instanceof $this->entityName)) {
            return;
        }

        return $this->serializer->serialize(
            $data,
            $this->format,
            ['groups' => 'show_'.$this->serializationGroupsPrefix]
        );
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
