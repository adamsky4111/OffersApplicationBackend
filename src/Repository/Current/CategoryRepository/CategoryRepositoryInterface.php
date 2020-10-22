<?php

namespace App\Repository\Current\CategoryRepository;

interface CategoryRepositoryInterface
{
    public function getOne($id);

    public function getAllActive();
}