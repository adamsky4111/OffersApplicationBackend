<?php

namespace App\Utils\EntityFilters\CategoryFilter;

use App\Utils\EntityFilters\AbstractEntityFilter;

class CategoryFilter extends AbstractEntityFilter implements CategoryFilterInterface
{
    public function filterByName(string $name, array $data = null)
    {
        $this->setData($data);
        $this->contains('name', $name);

        return $this;
    }
}
