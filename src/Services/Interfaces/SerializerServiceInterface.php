<?php

namespace App\Services\Interfaces;

use Symfony\Component\Serializer\SerializerInterface;

interface SerializerServiceInterface
{
    public function __construct(SerializerInterface $serializer);

    public function serializeList(array $data);

    public function serializeObject(object $data);

    public function deserializeObject(string $data);
}