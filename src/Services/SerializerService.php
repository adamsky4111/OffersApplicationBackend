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

    public function serializeList(array $data)
    {
        $entityName = get_class($data[0]);
        $this->setSerializationStrategyByEntityName($entityName);

        return $this->serializationStrategy->entitiesToJson($data);
    }

    public function serializeObject(BaseEntity $data)
    {
        $entityName = get_class($data);
        $this->setSerializationStrategyByEntityName($entityName);

        return $this->serializationStrategy->entityToJson($data);
    }

    public function deserializeObject(string $data, $entityName)
    {
        $this->setSerializationStrategyByEntityName($entityName);

        return $this->serializationStrategy->jsonToEntity($data);
    }

    private function setSerializationStrategyByEntityName($className)
    {
        $this->serializationStrategy = $this->serializationStrategies[$className];
    }
}
