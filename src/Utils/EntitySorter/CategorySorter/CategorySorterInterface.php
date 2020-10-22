<?php

namespace App\Utils\EntitySorter\Interfaces;

interface CategorySorterInterface
{
    public function getSortedByCreatedAt(array $data, bool $desc = false);

    public function getSortedByUpdatedAt(array $data, bool $desc = false);

    public function getSortedByName(array $data, bool $desc = false);
}
