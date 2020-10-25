<?php

namespace App\Utils\EntitySorter\OfferSorter;

use App\Utils\EntitySorter\AbstractEntitySorter;

class OfferSorter extends AbstractEntitySorter implements OfferSorterInterface
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

    public function sortByTitle(array $data, bool $desc = false)
    {
        $this->setDataAndOneSort($data, 'title', $desc);

        return $this;
    }

    public function sortByCategoryName(array $data, bool $desc = false)
    {
        // TODO: Implement getSortedByCategoryName() method.
    }
}
