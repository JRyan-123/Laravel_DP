<?php

namespace App\Http\Controllers\Web;

use App\DTOs\TodoData;
use App\Http\Controllers\Controller;
use App\Http\Requests\TodoRequest;
use App\Services\TodoService;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Class constructor.
     */
    public function __construct(protected TodoService $todo_service) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = $this->todo_service->list(auth()->id());
        return view('list', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TodoRequest $request)
    {
        $this->todo_service->createTodo(auth()->id(), TodoData::fromRequest($request));
        return redirect()->route('todos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
