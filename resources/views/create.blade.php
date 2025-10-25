<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    Add new task
                    <form id="todo-form" action="{{ route('todos.store') }}" method="POST" class="flex mb-4 ">
                        @csrf
                        <input type="text" name="title" id="title"
                            class=" text-neutral-950 flex-1 border border-gray-300 rounded-l px-3 py-2 focus:outline-none "
                            placeholder="Enter new todo..." required>

                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-r hover:bg-blue-700">
                            Add
                        </button>
                    </form>
                    @error('title')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
