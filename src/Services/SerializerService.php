<?php

namespace App\Services;

use App\Entity\BaseEntity;
use App\Entity\Category;
use App\Entity\Offer;
use App\Entity\Proposition;
use App\Services\Interfaces\SerializerServiceInterface;
use App\Utils\EntitySerializers\AbstractEntitySerializer;
use App\Utils\EntitySerializers\CategorySerializer;
use App\Utils\EntitySerializers\OfferSerializer;
use App\Utils\EntitySerializers\PropositionSerializer;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Class SerializerService
 * This is class for handle serialization of entities in application.
 * It uses serializers in App\Utils\EntitySerializers for specific serialization.
 * It's based on Strategy pattern to set up serialization strategy based on entry entity.
 */
class SerializerService implements SerializerServiceInterface
{
    private SerializerInterface $serializer;
    private array $serializationStrategies = [];
    private AbstractEntitySerializer $serializationStrategy;

    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
        $this->serializationStrategies = [
            Category::class => new CategorySerializer($serializer),
            Offer::class => new OfferSerializer($serializer),
            Proposition::class => new PropositionSerializer($serializer),
        ];
    }

    // method for serialize entry entities in array.=
    public function serializeList(array $data)
    {
        $entityName = get_class($data[0]);
        $this->setSerializationStrategyByEntityName($entityName);

        return $this->serializationStrategy->entitiesToJson($data);
    }

    // method for serialize single entity
    public function serializeObject(BaseEntity $data)
    {
        $entityName = get_class($data);
        $this->setSerializationStrategyByEntityName($entityName);

        return $this->serializationStrategy->entityToJson($data);
    }

    // method to deserialize entity
    public function deserializeObject(string $data, $entityName)
    {
        $this->setSerializationStrategyByEntityName($entityName);

        return $this->serializationStrategy->jsonToEntity($data);
    }

    // private function to set strategy based on className property passed by parameter
    private function setSerializationStrategyByEntityName($className)
    {
        $this->serializationStrategy = $this->serializationStrategies[$className];
    }
}
