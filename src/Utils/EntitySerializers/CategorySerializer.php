<?php

namespace App\Utils\EntitySerializers;

use App\Entity\Category;
use Symfony\Component\Serializer\SerializerInterface;

class CategorySerializer extends AbstractEntitySerializer
{
    public function __construct(SerializerInterface $serializer)
    {
        parent::__construct($serializer, Category::class);
    }
}
