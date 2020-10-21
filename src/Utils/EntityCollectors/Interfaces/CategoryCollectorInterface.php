<?php

namespace App\Utils\EntityCollectors\Interfaces;

interface CategoryCollectorInterface
{
    public function getOne($id);

    public function getAllActive();
}
