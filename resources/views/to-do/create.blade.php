<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('To Do - Create') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('toDo.store') }}" class="space-y-2" method="POST">
                        @csrf
                        @method('POST')

                        <div class="w-full flex flex-col">
                            <input type="text" name="title" id="title" class="w-full rounded" placeholder="Title" value={{ old('title') }}>
                            @error('title')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="w-full flex flex-col">
                            <textarea name="description" id="description" cols="30" rows="3" class="w-full rounded" placeholder="Description" value={{ old('description') }}></textarea>
                            @error('description')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="w-full flex flex-col">
                            <label for="due_date">Due Date</label>
                            <input type="date" name="due_date" id="due_date" class="w-full rounded" value={{ old('due_date') }}>
                            @error('due_date')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex justify-end mb-4">
                            <button type="submit" class="bg-gray-800 hover:bg-gray-900 text-white font-bold py-2 px-2 rounded duration-300">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
