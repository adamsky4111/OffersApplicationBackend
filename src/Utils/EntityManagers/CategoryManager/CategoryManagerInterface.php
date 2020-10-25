<?php

namespace App\Utils\EntityManagers\CategoryManager;

use App\Entity\Category;

interface CategoryManagerInterface
{
    public function setEntity(Category $offer);

    public function create();

    public function update();

    public function delete();
}
