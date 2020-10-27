<?php

namespace App\Services\CategoryService;

use App\Utils\EntityCollectors\CategoryCollector\CategoryCollectorInterface;
use App\Utils\EntityFilters\CategoryFilter\CategoryFilterInterface;
use App\Utils\EntityManagers\CategoryManager\CategoryManagerInterface;
use App\Utils\EntitySerializers\CategorySerializer;
use App\Utils\EntitySorter\CategorySorter\CategorySorterInterface;

class CategoryService implements CategoryServiceInterface
{
    private CategoryManagerInterface $manager;
    private CategoryCollectorInterface $collector;
    private CategoryFilterInterface $filter;
    private CategorySorterInterface $sorter;
    private CategorySerializer $serializer;

    public function __construct(
        CategoryManagerInterface $manager,
        CategoryCollectorInterface $collector,
        CategoryFilterInterface $filter,
        CategorySorterInterface $sorter,
        CategorySerializer $serializer
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
