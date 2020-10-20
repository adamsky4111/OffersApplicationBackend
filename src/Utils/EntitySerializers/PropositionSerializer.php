<?php

namespace App\Utils\EntitySerializers;

use App\Entity\Proposition;
use Symfony\Component\Serializer\SerializerInterface;

class PropositionSerializer extends AbstractEntitySerializer
{
    public function __construct(SerializerInterface $serializer)
    {
        parent::__construct($serializer, Proposition::class);
    }
}
