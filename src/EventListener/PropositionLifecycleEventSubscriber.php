<?php

namespace App\EventListener;

use App\Entity\Proposition;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Events;
use Doctrine\Persistence\Event\LifecycleEventArgs;

class PropositionLifecycleEventSubscriber implements EventSubscriber
{
    public function getSubscribedEvents()
    {
        return [
            Events::prePersist,
        ];
    }

    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();
        if (!$entity instanceof Proposition) {
            $entity->setCreatedAt(new \DateTime('now'));
        }

        return $entity;
    }
}
