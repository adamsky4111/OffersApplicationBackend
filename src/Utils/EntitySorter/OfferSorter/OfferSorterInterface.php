<?php

namespace App\Utils\EntitySorter\OfferSorter;

interface OfferSorterInterface
{
    public function sortByCreatedAt(array $data, bool $desc = false);

    public function sortByUpdatedAt(array $data, bool $desc = false);

    public function sortByPrice(array $data, bool $desc = false);

    public function sortByTitle(array $data, bool $desc = false);

    public function sortByCategoryName(array $data, bool $desc = false);

    public function getResult();
}
