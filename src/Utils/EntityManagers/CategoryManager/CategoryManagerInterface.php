<?php

namespace App\Utils\EntityManagers\CategoryManager;

use App\Entity\Category;

interface CategoryManagerInterface
{
    public function add(Category $category);

    public function update(Category $category);

    public function delete(Category $category);
}
