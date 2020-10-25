<?php

namespace App\EventListener;

use App\Entity\Offer;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Events;
use Doctrine\Persistence\Event\LifecycleEventArgs;

class OfferLifecycleEventSubscriber implements EventSubscriber
{
    public function getSubscribedEvents()
    {
        return [
            Events::prePersist,
            Events::preUpdate,
        ];
    }

    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();
        if (!$entity instanceof Offer) {
            $entity->setCreatedAt(new \DateTime('now'));
        }

        return $entity;
    }

    public function preUpdate(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();
        if (!$entity instanceof Offer) {
            $entity->setUpdatedAt(new \DateTime('now'));
        }

        return $entity;
    }
}
