<?php

namespace App\Utils\EntitySorter\Interfaces;

interface CategorySorterInterface
{
    public function getSortedByCreatedAt(bool $desc = false);

    public function getSortedByUpdatedAt(bool $desc = false);

    public function getSortedByName(bool $desc = false);
}
