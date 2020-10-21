<?php

namespace App\Utils\EntityFilters\Interfaces;

interface OfferFilterInterface
{
    public function filterByPrice($from, $to, array $data);

    public function filterByTitle(string $title, array $data);

    public function filterByIsCompany(bool $isCompany, array $data);

    public function filterByCategoryName(string $categoryName, array $data);
}
