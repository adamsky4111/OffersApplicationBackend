<?php

namespace App\Utils\EntityFilters\PropositionFilter;

use App\Utils\EntityFilters\AbstractEntityFilter;

class PropositionFilter extends AbstractEntityFilter implements PropositionFilterInterface
{
    public function filterPrice($from, $to, $data = null)
    {
        $this->setData($data);

        $this->whereBetween('price', $from, $to);
    }
}
