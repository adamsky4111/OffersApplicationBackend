<?php

namespace App\Utils\EntityManagers\OfferManager;

use App\Entity\Offer;

interface OfferManagerInterface
{
    public function create(Offer $offer);

    public function update(Offer $offer);

    public function delete(Offer $offer);

    public function publish(Offer $offer);

    public function end(Offer $offer);

    public function activate(Offer $offer);
}
