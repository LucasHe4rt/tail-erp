<?php

namespace App\Repositories\Eloquent;

use App\Repositories\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements EloquentRepositoryInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function paginate(int $perPage = 10)
    {
        return $this->model->paginate($perPage);
    }

    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    public function findById(int $id)
    {
        return $this->model->findOrFail($id);
    }

    public function updateById(array $attributes, int $id)
    {
        return $this->model->findOrFail($id)->update($attributes);
    }

    public function deleteById(int $id)
    {
        return $this->model->findOrFail($id)->delete();
    }
}
