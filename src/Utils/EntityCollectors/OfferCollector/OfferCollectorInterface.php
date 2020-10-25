<?php

namespace App\Utils\EntityCollectors\OfferCollector;

use App\Repository\Current\OfferRepository\OfferRepositoryInterface;

interface OfferCollectorInterface
{
    public function __construct(OfferRepositoryInterface $repository);

    public function getOne($id);

    public function getAllActive();

    public function getAllEnded();

    public function getAllDeleted();
}
