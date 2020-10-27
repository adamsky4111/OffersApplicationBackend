<?php

namespace App\Services\OfferService;

use App\Utils\EntityCollectors\OfferCollector\OfferCollectorInterface;
use App\Utils\EntityFilters\OfferFilter\OfferFilterInterface;
use App\Utils\EntityManagers\OfferManager\OfferManagerInterface;
use App\Utils\EntitySerializers\OfferSerializer;
use App\Utils\EntitySorter\OfferSorter\OfferSorterInterface;

interface OfferServiceInterface
{
    public function collect(): OfferCollectorInterface;

    public function filter(): OfferFilterInterface;

    public function sort(): OfferSorterInterface;

    public function serialize(): OfferSerializer;

    public function manage(): OfferManagerInterface;
}
