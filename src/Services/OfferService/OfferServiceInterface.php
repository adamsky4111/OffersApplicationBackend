<?php

namespace App\Services\OfferService;

use App\Entity\Offer;

interface OfferServiceInterface
{
    public function collect();

    public function filter();

    public function sort();

    public function serialize();

    public function manage();
}
