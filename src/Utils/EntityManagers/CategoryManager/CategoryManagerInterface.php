<?php

namespace App\Utils\EntityManagers\CategoryManager;

use App\Entity\Category;

interface CategoryManagerInterface
{
    public function setEntity(Category $category);

    public function create();

    public function update();

    public function delete();
}
