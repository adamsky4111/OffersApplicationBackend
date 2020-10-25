<?php

namespace App\Utils\EntityFilters\OfferFilter;

interface OfferFilterInterface
{
    public function filterByPrice($from, $to, array $data = null);

    public function filterByTitle(string $title, array $data = null);

    public function filterByIsCompany(bool $isCompany, array $data = null);

    public function filterByCategoryName(string $categoryName, array $data = null);
}
