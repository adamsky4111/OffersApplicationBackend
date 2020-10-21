<?php

namespace App\Utils\EntityManagements\Interfaces;

use App\Entity\Category;

interface CategoryManagementInterface
{
    public function add(Category $category);

    public function update(Category $category);

    public function delete(Category $category);
}
