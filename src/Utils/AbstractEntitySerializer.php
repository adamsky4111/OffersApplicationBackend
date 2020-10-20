<?php

namespace App\Utils;

use Symfony\Component\Serializer\SerializerInterface;

abstract class AbstractEntitySerializer implements EntitySerializerInterface
{
    protected SerializerInterface $serializer;
    protected string $entityName;
    protected string $format = 'json';

    public function __construct(SerializerInterface $serializer, $entityName)
    {
        $this->serializer = $serializer;
        $this->entityName = $entityName;
    }
}
