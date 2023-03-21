<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface CrudRepositoryInterface
{
    public function create(array $data): Model;
    public function list(int $parentId): Collection;
    public function get(int $id): Model;
    public function update(int $id, array $data): bool | Model;
    public function delete(int $id): bool;
}
