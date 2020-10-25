<?php

namespace App\Utils\EntitySorter;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Criteria;

/**
 * Class AbstractEntitySorter.
 *
 * @author Adam Dziegielewski
 *
 * This class is for sorting entity by specific values,
 * Every entity which require sorting, should have extend this class.
 */
class AbstractEntitySorter
{
    // sorters in associative array ['foo' => 'boo']
    // foo - entity field name, boo - can have 'DESC' or 'ASC' values, it works like in
    // SQL databases query
    protected ?array $sorters = null;

    // ArrayCollection created from passed data
    protected ?ArrayCollection $data = null;

    // method to get result, when data and sorters are set
    public function getResult(array $data = null, array $sorters = null)
    {
        // check if arguments are passed, if they are, set them.
        if (2 === func_num_args()) {
            $this->setData($data);
            foreach ($sorters as $sorter) {
                $this->addSorter($sorter);
            }
        }

        if (null !== $this->sorters && null !== $this->data) {
            return $this->data->matching(Criteria::create()->orderBy($this->sorters))->getValues();
        }

        return;
    }

    // add sorter, passed argument: entity field name
    public function addSorter($entityField, $desc = true)
    {
        $this->sorters[$entityField] = $desc ? 'DESC' : 'ASC';

        return $this;
    }

    // set data based on passed variable
    public function setData($data)
    {
        if (is_array($data)) {
            $this->data = new ArrayCollection($data);
        }

        return $this;
    }

    // method to set data and add one sorter, mostly used in EntitySorters
    protected function setDataAndOneSort($data, $entityField, $desc = true)
    {
        $this->setData($data);
        $this->addSorter($entityField, $desc);

        return $this;
    }
}
