<?php

namespace App\Repositories;
use App\Interfaces\TodoInterface;

use App\Models\Todo;
use Illuminate\Database\Eloquent\Collection;

class TodoRepository implements TodoInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct(protected Todo $todo) {}

    /**
     * fetch all todo models on specific user
     *
     * @param integer $userId
     * @return use Illuminate\Database\Eloquent\Collection;
     */
    public function allForUser(int $userId): Collection
    {
        return Todo::where('user_id', $userId)->get();
    }


    /**
     * save Todo data
     *
     * @param array $data
     * @return Todo
     */
    public function create(array $data): Todo
    {
        return Todo::create($data);
    }

    /**
     * find a Todo row model
     *
     * @param integer $id
     * @return void
     */
    public function find(int $id)
    {
        return Todo::findOrFail($id);
    }

    /**
     * toggle completed value bool
     *
     * @param [type] $id
     * @return void
     */
    public function toggle($id)
    {
        $todo = $this->find($id);
        $todo->completed = !$todo->completed;
        $todo->save();
        return $todo;
    }

    /**
     * destroys selected model row
     *
     * @param integer $id
     * @return void
     */
    public function delete(int $id)
    {
        return Todo::destroy($id);
    }
}
