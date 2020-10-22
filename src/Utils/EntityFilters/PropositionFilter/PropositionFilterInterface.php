<?php

namespace App\Utils\EntityFilters\PropositionFilter;

interface PropositionFilterInterface
{
    public function filterPrice($from, $to, $data = null);
}
