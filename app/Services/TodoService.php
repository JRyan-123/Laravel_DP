<?php

namespace App\Services;

use App\DTOs\TodoData;
use App\Interfaces\TodoInterface;
use App\Models\Todo;
use Illuminate\Database\Eloquent\Collection;

class TodoService
{
    /**
     * Create a new class instance.
     */
    public function __construct(protected TodoInterface $todo_interface) {}

    /**
     * fetch todo models
     *
     * @param integer $userId
     * @return Collection
     */
    public function list( int $userId): Collection
    {
        return $this->todo_interface->allForUser($userId);
    }

    /**
     * create Todo
     *
     * @param integer $userId
     * @param TodoData $data
     * @return Todo
     */
    public function createTodo(int $userId ,TodoData $data): Todo
    {
        return $this->todo_interface->create([
            'user_id' => $userId,
            'title' => $data->title,
        ]);
    }

    /**
     * call toggle repository
     *
     * @param integer $id
     * @return void
     */
    public function toggleCompleted(int $id)
    {
        return $this->todo_interface->toggle($id);
    }
    

    public function deleteTodo(int $id)
    {
        return $this->todo_interface->delete($id);
    }

}
