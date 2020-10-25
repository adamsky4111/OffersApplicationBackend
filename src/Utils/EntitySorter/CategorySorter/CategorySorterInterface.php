<?php

namespace App\Utils\EntitySorter\CategorySorter;

interface CategorySorterInterface
{
    public function sortByCreatedAt(array $data, bool $desc = false);

    public function sortByUpdatedAt(array $data, bool $desc = false);

    public function sortByName(array $data, bool $desc = false);

    public function getResult();
}
