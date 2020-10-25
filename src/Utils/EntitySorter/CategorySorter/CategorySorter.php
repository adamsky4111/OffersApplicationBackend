<?php

namespace App\Utils\EntitySorter\CategorySorter;

use App\Utils\EntitySorter\AbstractEntitySorter;

class CategorySorter extends AbstractEntitySorter implements CategorySorterInterface
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

    public function sortByName(array $data, bool $desc = false)
    {
        $this->setDataAndOneSort($data, 'name', $desc);

        return $this;
    }
}
