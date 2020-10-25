<?php

namespace App\Utils\EntitySorter\PropositionSorter;

interface PropositionSorterInterface
{
    public function sortByCreatedAt(array $data, bool $desc = false);

    public function sortByUpdatedAt(array $data, bool $desc = false);

    public function sortByPrice(array $data, bool $desc = false);
}
