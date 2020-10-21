<?php

namespace App\Utils\EntityCollectors\Interfaces;

interface PropositionCollectorInterface
{
    public function getOne($id);

    public function getAllActive();
}
