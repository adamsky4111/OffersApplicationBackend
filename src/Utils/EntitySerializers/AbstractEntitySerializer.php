<?php

namespace App\Utils\EntitySerializers;

use App\Entity\BaseEntity;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

abstract class AbstractEntitySerializer implements EntitySerializerInterface
{
    protected SerializerInterface $serializer;
    protected string $entityName;
    protected string $format = 'json';
    protected string $serializationGroupsPrefix = '';

    public function __construct(SerializerInterface $serializer, $entityName, string $serializationGroupsPrefix = null)
    {
        $this->serializer = $serializer;
        $this->entityName = $entityName;
        if (null !== $serializationGroupsPrefix) {
            $this->serializationGroupsPrefix = $serializationGroupsPrefix;
        } else {
            //Create prefix for serialization groups, for instance, for Category class it generate 'category'
            $entityBasename = basename(str_replace('\\', '/', $entityName));
            $this->serializationGroupsPrefix = strtolower($entityBasename);
        }
    }

    public function entitiesToJson(array $data)
    {
        if (!($data[0] instanceof $this->entityName)) {
            return;
        }

        return $this->serializer->serialize(
            $data,
            $this->format,
            ['groups' => [$this->serializationGroupsPrefix.'_list', 'ids']]
        );
    }

    public function entityToJson(BaseEntity $data)
    {
        if (!($data instanceof $this->entityName)) {
            return;
        }

        return $this->serializer->serialize(
            $data,
            $this->format,
            ['groups' => [$this->serializationGroupsPrefix.'_show', 'ids']]
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
