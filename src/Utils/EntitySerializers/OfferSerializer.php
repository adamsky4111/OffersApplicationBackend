<?php

namespace App\Utils\EntitySerializers;

use App\Entity\Offer;
use Symfony\Component\Serializer\SerializerInterface;

class OfferSerializer extends AbstractEntitySerializer
{
    public function __construct(SerializerInterface $serializer)
    {
        parent::__construct($serializer, Offer::class);
    }
}
