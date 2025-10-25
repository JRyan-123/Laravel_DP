<?php

namespace App\Livewire;

use App\Services\TodoService;
use Livewire\Component;

class TodoLivewire extends Component
{   
    public $todos= [];

    protected $todo_service;

    public function boot(TodoService $todo_service)
    {
        $this->todo_service = $todo_service;
    }

    /**
     * loads todos model for auth user
     *
     * @return void
     */
    public function mount()
    {
        $this->todos = $this->todo_service->list(auth()->id());
    }

    /**
     * toggle the state of the selected model
     *
     * @param integer $id
     * @return void
     */
    public function toggle(int $id)
    {   
        $this->todo_service->toggleCompleted($id);
        $this->todos = $this->todo_service->list(auth()->id());
    }

    public function delete(int $id)
    {
        $this->todo_service->deleteTodo($id);
        $this->todos = $this->todo_service->list(auth()->id());
    }

    public function render()
    {
        return view('livewire.todo-livewire');
    }
}
