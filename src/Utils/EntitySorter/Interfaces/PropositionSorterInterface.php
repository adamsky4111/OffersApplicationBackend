<?php

namespace App\Utils\EntitySorter\Interfaces;

interface PropositionSorterInterface
{
    public function getSortedByCreatedAt(array $data, bool $desc = false);

    public function getSortedByUpdatedAt(array $data, bool $desc = false);

    public function getSortedByPrice(array $data, bool $desc = false);
}
