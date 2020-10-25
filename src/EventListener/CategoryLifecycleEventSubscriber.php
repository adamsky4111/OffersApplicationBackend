<?php

namespace App\EventListener;

use App\Entity\Category;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Events;
use Doctrine\Persistence\Event\LifecycleEventArgs;

class CategoryLifecycleEventSubscriber implements EventSubscriber
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
        if (!$entity instanceof Category) {
            $entity->setCreatedAt(new \DateTime('now'));
        }

        return $entity;
    }

    public function preUpdate(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();
        if (!$entity instanceof Category) {
            $entity->setUpdatedAt(new \DateTime('now'));
        }

        return $entity;
    }
}
