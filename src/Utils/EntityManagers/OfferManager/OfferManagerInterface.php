<?php

namespace App\Utils\EntityManagers\OfferManager;

use App\Entity\Offer;

interface OfferManagerInterface
{
    public function setEntity(Offer $offer);

    public function create();

    public function update();

    public function delete();

    public function publish();

    public function end();

    public function reActivate();
}
