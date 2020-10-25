<?php

namespace App\Utils\EntitySerializers;

use App\Entity\BaseEntity;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Class AbstractEntitySerializer
 * This is abstract class for generic use cases.
 */
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

        // If serialization prefix is passed by constructor
        if (null !== $serializationGroupsPrefix) {
            $this->serializationGroupsPrefix = $serializationGroupsPrefix;
        } else {
            // if serialization prefix isn't passed by construct, it's necessary to
            // create prefix for serialization groups, for instance:
            // we have entity Product in App\Entity so it take Product without App\Entity namespace
            // then it format string to lower. We do not need to pass prefix by construct.
            $entityBasename = basename(str_replace('\\', '/', $entityName));
            $this->serializationGroupsPrefix = strtolower($entityBasename);
        }
    }

    // generic many entities to json, serialization groups is based on parameters passed by construct
    public function entitiesToJson($data)
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

    // generic one entity to json, serialization groups is based on parameters passed by construct
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

    // generic json to entity
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
