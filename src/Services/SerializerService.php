<?php

namespace App\Services;

use App\Entity\Category;
use App\Entity\Offer;
use App\Entity\Proposition;
use App\Services\Interfaces\SerializerServiceInterface;
use App\Utils\AbstractEntitySerializer;
use App\Utils\CategorySerializer;
use App\Utils\OfferSerializer;
use App\Utils\PropositionSerializer;
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
        $className = get_class($data[0]);
        $this->setStrategy($this->serializationStrategies[$className]);

        return $this->serializationStrategy->entitiesToJson($data);
    }

    private function setStrategy(AbstractEntitySerializer $strategy)
    {
        $this->serializationStrategy = $strategy;
    }

    public function serializeObject(object $data)
    {
        // TODO: Implement serializeObject() method.
    }

    public function deserializeObject(string $data, $entityName)
    {
        // TODO: Implement deserializeObject() method.
    }
}