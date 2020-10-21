<?php

namespace App\Utils\EntityCollectors\Interfaces;

interface OfferCollectorInterface
{
    public function getOne($id);

    public function getAllActive();

    public function getAllEnded();

    public function getAllDeleted();
}
