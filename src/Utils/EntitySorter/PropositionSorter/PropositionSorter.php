<?php

namespace App\Utils\EntitySorter\PropositionSorter;

use App\Utils\EntitySorter\AbstractEntitySorter;
use App\Utils\EntitySorter\Interfaces\PropositionSorterInterface;

class PropositionSorter extends AbstractEntitySorter implements PropositionSorterInterface
{
    public function getSortedByCreatedAt(array $data, bool $desc = false)
    {
        return $this->setDataAndOneSort($data, 'createdAt', $desc)
            ->getResult();
    }

    public function getSortedByUpdatedAt(array $data, bool $desc = false)
    {
        return $this->setDataAndOneSort($data, 'updatedAt', $desc)
            ->getResult();
    }

    public function getSortedByPrice(array $data, bool $desc = false)
    {
        return $this->setDataAndOneSort($data, 'price', $desc)
            ->getResult();
    }
}
