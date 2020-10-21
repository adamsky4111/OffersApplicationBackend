<?php

namespace App\Utils\EntityFilters\Interfaces;

use App\Entity\Proposition;

interface PropositionFilterInterface
{
    public function filterByOfferAndPrice(Proposition $proposition, string $from, string $to);
}
