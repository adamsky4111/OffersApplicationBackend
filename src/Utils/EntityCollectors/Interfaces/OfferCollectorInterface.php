<?php

namespace App\Utils\EntityCollectors\Interfaces;

interface OfferCollectorInterface
{
    public function getOne($id);

    public function getAllActive(bool $pagination = true, int $page = 1, int $perPage = 10);

    public function getAllEnded(bool $pagination = true, int $page = 1, int $perPage = 10);

    public function getAllDeleted(bool $pagination = true, int $page = 1, int $perPage = 10);
}
