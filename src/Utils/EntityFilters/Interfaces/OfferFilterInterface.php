<?php

namespace App\Utils\EntityFilters\Interfaces;

interface OfferFilterInterface
{
    public function filterByPrice($from, $to);

    public function filterByTitle(string $title);

    public function filterByIsCompany(bool $isCompany);

    public function filterByCategoryName(string $categoryName);
}
