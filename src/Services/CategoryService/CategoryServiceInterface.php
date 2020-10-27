<?php

namespace App\Services\CategoryService;

interface CategoryServiceInterface
{
    public function collect();

    public function filter();

    public function sort();

    public function serialize();

    public function manage();
}
