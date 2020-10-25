<?php

namespace App\Utils\EntityManagers\OfferManager;

use App\Entity\Offer;
use App\Utils\EntityManagers\AbstractSpecificEntityManager;

/**
 * @property Offer $entity
 */
class OfferManager extends AbstractSpecificEntityManager implements OfferManagerInterface
{
    public function delete()
    {
        if ($this->entity instanceof Offer) {
            $this->entity->setDeletedAt(new \DateTime('now'));
            $this->entity->setIsDeleted(true);
            $this->update();

            return $this;
        }

        return;
    }

    public function end()
    {
        if (!$this->dataIsSet()) {
            return;
        }

        $this->entity->setIsEnded(true);
        $this->entity->setEndedAt(new \DateTime('now'));
        $this->update();

        return $this;
    }

    public function reActivate()
    {
        if (!$this->dataIsSet()) {
            return;
        }

        $this->entity = $this->entity->reActive();
        $this->entity->setTitle('chuj');
        $this->publish();

        return $this;
    }

    public function publish()
    {
        if (!$this->dataIsSet()) {
            return;
        }

        $this->entity->setIsPublished(true);
        $this->entity->setPublishedAt(new \DateTime('now'));
        $this->update();

        return $this;
    }
}
