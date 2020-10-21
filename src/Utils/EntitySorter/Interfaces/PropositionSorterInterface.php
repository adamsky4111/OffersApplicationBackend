<?php

namespace App\Utils\EntitySorter\Interfaces;

interface PropositionSorterInterface
{
    public function getSortedByCreatedAt(bool $desc = false);

    public function getSortedByUpdatedAt(bool $desc = false);

    public function getSortedByPrice(bool $desc = false);
}
