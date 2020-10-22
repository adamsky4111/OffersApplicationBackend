<?php

namespace App\Utils\EntityFilters;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Criteria;

/**
 * Class AbstractEntityFilter.
 *
 * @author Adam Dziegielewski
 *
 * This class is for filter entity by specific values,
 * Every entity which require filtering , should have extend this class.
 */
class AbstractEntityFilter
{
    // data for filter
    protected ?ArrayCollection $data = null;

    // criteria
    protected ?Criteria $criteria = null;

    // method to get result of sort
    public function getResult(array $data = null)
    {
        // check if arguments are set
        if (null !== $this->criteria && null !== $this->data) {
            return $this->data->matching($this->criteria)->getValues();
        }

        return;
    }

    // method to set data based on passed parameter
    // and create new criteria
    public function setData($data)
    {
        if (null !== $data && is_array($data)) {
            $this->data = new ArrayCollection($data);
            $this->criteria = Criteria::create();
        }
    }

    // set field equal
    public function whereEqual($field, $value)
    {
        $this->criteria->andWhere(Criteria::expr()->eq($field, $value));
    }

    // set field is between passed parameters: $from, $to
    public function whereBetween($field, $from, $to)
    {
        if (null !== $to) {
            $this->whereLowerOrEqual($field, $to);
        }

        if (null !== $from) {
            $this->whereGreaterOrEqual($field, $from);
        }
    }

    // set field greater or equal
    public function whereGreaterOrEqual($field, $value)
    {
        $this->criteria->andWhere(Criteria::expr()->gte($field, $value));
    }

    // set field lower or equal
    public function whereLowerOrEqual($field, $value)
    {
        $this->criteria->andWhere(Criteria::expr()->lte($field, $value));
    }

    // set field greater
    public function whereGreater($field, $value)
    {
        $this->criteria->andWhere(Criteria::expr()->gt($field, $value));
    }

    // set field lower
    public function whereLower($field, $value)
    {
        $this->criteria->andWhere(Criteria::expr()->lt($field, $value));
    }

    // set field contains
    public function contains($field, string $value)
    {
        $this->criteria->andWhere(Criteria::expr()->contains($field, $value));
    }
}
