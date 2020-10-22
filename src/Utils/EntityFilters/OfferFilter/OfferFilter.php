<?php

namespace App\Utils\EntityFilters\OfferFilter;

use App\Utils\EntityFilters\AbstractEntityFilter;

class OfferFilter extends AbstractEntityFilter implements OfferFilterInterface
{
    public function filterByPrice($from, $to, array $data = null)
    {
        $this->setData($data);
        $this->whereBetween('price', $from, $to);

        return $this;
    }

    public function filterByTitle(string $title, array $data = null)
    {
        $this->setData($data);
        $this->contains('title', $title);

        return $this;
    }

    public function filterByIsCompany(bool $isCompany, array $data = null)
    {
        $this->setData($data);
        $this->whereEqual('isCompany', $isCompany);

        return $this;
    }

    public function filterByCategoryName(string $categoryName, array $data = null)
    {
        // TODO: Implement filterByCategoryName() method.
    }
}
