<?php

namespace App\Utils\EntityManagers\PropositionManager;

use App\Entity\Proposition;

interface PropositionManagerInterface
{
    public function setEntity(Proposition $proposition);

    public function create();

    public function update();

    public function delete();
}
