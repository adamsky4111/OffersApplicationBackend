<?php

namespace App\Services\OfferService;

use App\Utils\EntityCollectors\OfferCollector\OfferCollectorInterface;
use App\Utils\EntityFilters\OfferFilter\OfferFilterInterface;
use App\Utils\EntityManagers\OfferManager\OfferManagerInterface;
use App\Utils\EntitySerializers\OfferSerializer;
use App\Utils\EntitySorter\OfferSorter\OfferSorterInterface;

class OfferService implements OfferServiceInterface
{
    private OfferManagerInterface $manager;
    private OfferCollectorInterface $collector;
    private OfferFilterInterface $filter;
    private OfferSorterInterface $sorter;
    private OfferSerializer $serializer;

    public function __construct(
        OfferManagerInterface $manager,
        OfferCollectorInterface $collector,
        OfferFilterInterface $filter,
        OfferSorterInterface $sorter,
        OfferSerializer $serializer
    ) {
        $this->manager = $manager;
        $this->collector = $collector;
        $this->filter = $filter;
        $this->sorter = $sorter;
        $this->serializer = $serializer;
    }

    public function collect()
    {
        return $this->collector;
    }

    public function filter()
    {
        return $this->filter;
    }

    public function sort()
    {
        return $this->sorter;
    }

    public function serialize()
    {
        return $this->serializer;
    }

    public function manage()
    {
        return $this->manager;
    }
}
