<?php

namespace App\Utils\EntitySorter\CategorySorter;

use App\Utils\EntitySorter\AbstractEntitySorter;
use App\Utils\EntitySorter\Interfaces\CategorySorterInterface;

class CategorySorter extends AbstractEntitySorter implements CategorySorterInterface
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

    public function getSortedByName(array $data, bool $desc = false)
    {
        return $this->setDataAndOneSort($data, 'name', $desc)
            ->getResult();
    }
}
