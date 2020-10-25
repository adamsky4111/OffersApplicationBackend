<?php

namespace App\Utils\EntitySorter\OfferSorter;

interface OfferSorterInterface
{
    public function getSortedByCreatedAt(array $data, bool $desc = false);

    public function getSortedByUpdatedAt(array $data, bool $desc = false);

    public function getSortedByPrice(array $data, bool $desc = false);

    public function getSortedByTitle(array $data, bool $desc = false);

    public function getSortedByCategoryName(array $data, bool $desc = false);
}
