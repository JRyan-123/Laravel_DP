<div>
    <h1 class="mb-4">Task</h1>
    <ul class="space-y-2">
        @foreach($todos as $todo)
            <li class="flex items-center justify-between border-b pb-2">
                <div>
                    <input 
                        type="checkbox" 
                        wire:click="toggle({{ $todo->id }})"
                        @checked($todo->completed)
                        class="mr-2" id="{{ $todo->title }}">
                    <label class="{{ $todo->completed ? 'line-through text-gray-400' : '' }}" for="{{ $todo->title }}">
                        {{ $todo->title }}
                    </label>
                </div>
                <button 
                    wire:click="delete({{ $todo->id }})"
                    class="text-red-600 hover:text-red-800">
                    ✖
                </button>
            </li>
        @endforeach
    </ul>
</div>
