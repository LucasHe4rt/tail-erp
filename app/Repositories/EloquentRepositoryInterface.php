<?php

namespace App\Repositories;

interface EloquentRepositoryInterface
{
    public function paginate(int $perPage = 10);

    public function create(array $attributes);

    public function findById(int $id);

    public function updateById(array $attributes, int $id);

    public function deleteById(int $id);
}
