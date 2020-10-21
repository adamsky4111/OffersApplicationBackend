<?php

namespace App\Utils\EntityManagements\Interfaces;

use App\Entity\Offer;

interface OfferManagementInterface
{
    public function add(Offer $offer);

    public function update(Offer $offer);

    public function delete(Offer $offer);

    public function publish(Offer $offer);

    public function end(Offer $offer);

    public function checkActive(Offer $offer);
}
