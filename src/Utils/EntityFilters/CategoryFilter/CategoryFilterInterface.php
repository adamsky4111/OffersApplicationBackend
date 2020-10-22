<?php

namespace App\Utils\EntityFilters\CategoryFilter;

interface CategoryFilterInterface
{
    public function filterByName(string $name, array $data = null);
}
