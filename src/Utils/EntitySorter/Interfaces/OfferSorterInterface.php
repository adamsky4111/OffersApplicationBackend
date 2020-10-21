<?php

namespace App\Utils\EntitySorter\Interfaces;

interface OfferSorterInterface
{
    public function getSortedByCreatedAt(bool $desc = false);

    public function getSortedByUpdatedAt(bool $desc = false);

    public function getSortedByPrice(bool $desc = false);

    public function getSortedByTitle(bool $desc = false);

    public function getSortedByCategoryName(bool $desc = false);
}
