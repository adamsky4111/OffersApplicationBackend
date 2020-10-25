<?php

namespace App\Utils\EntitySorter\PropositionSorter;

use App\Utils\EntitySorter\AbstractEntitySorter;

class PropositionSorter extends AbstractEntitySorter implements PropositionSorterInterface
{
    public function sortByCreatedAt(array $data, bool $desc = false)
    {
        $this->setDataAndOneSort($data, 'createdAt', $desc);

        return $this;
    }

    public function sortByUpdatedAt(array $data, bool $desc = false)
    {
        $this->setDataAndOneSort($data, 'updatedAt', $desc);

        return $this;
    }

    public function sortByPrice(array $data, bool $desc = false)
    {
        $this->setDataAndOneSort($data, 'price', $desc);

        return $this;
    }
}
