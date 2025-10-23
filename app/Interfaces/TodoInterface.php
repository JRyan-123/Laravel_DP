<?php

namespace App\Interfaces;

use App\Models\Todo;
use Illuminate\Database\Eloquent\Collection;

interface TodoInterface
{
     public function allForUser(int $userId): Collection;
     public function create(array $data): Todo;
     public function find(int $id);
     public function toggle(int $id);
     public function delete(int $id);

}
