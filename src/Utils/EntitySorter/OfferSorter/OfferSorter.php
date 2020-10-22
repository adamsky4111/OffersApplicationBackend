<?php

namespace App\Utils\EntitySorter\OfferSorter;

use App\Utils\EntitySorter\AbstractEntitySorter;

class OfferSorter extends AbstractEntitySorter implements OfferSorterInterface
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

    public function getSortedByTitle(array $data, bool $desc = false)
    {
        return $this->setDataAndOneSort($data, 'title', $desc)
            ->getResult();
    }

    public function getSortedByCategoryName(array $data, bool $desc = false)
    {
        // TODO: Implement getSortedByCategoryName() method.
    }
}
