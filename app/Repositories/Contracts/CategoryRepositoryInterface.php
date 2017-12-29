<?php

namespace App\Repositories\Contracts;

interface CategoryRepositoryInterface
{
    public function all();

    public function find($id);

    public function paginate();

    public function showParent();

    public function showConcept();

    public function create(array $input);
}
