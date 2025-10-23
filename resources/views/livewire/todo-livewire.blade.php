<div>
    <ul class="space-y-2">
        @foreach($todos as $todo)
            <li class="flex items-center justify-between border-b pb-2">
                <div>
                    <input 
                        type="checkbox" 
                        wire:click="toggle({{ $todo->id }})"
                        {{ $todo->completed ? 'checked' : '' }}
                        class="mr-2">
                    <span class="{{ $todo->completed ? 'line-through text-gray-400' : '' }}">
                        {{ $todo->title }}
                    </span>
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
