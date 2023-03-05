<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('To Do - Index') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="w-full table-auto rounded shadow">
                        {{-- create button --}}
                        <div class="flex justify-end mb-4">
                            <a href="{{ route('toDo.create') }}" class="bg-gray-800 hover:bg-gray-900 text-white font-bold py-2 px-2 rounded duration-300">Create</a>
                        </div>
                        <thead class="bg-gray-800 text-white uppercase">
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Completed</th>
                                <th>Due Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-slate-100">
                            @forelse ($data['toDos'] as $toDo)
                                <tr>
                                    <td class="text-center">{{ $toDo->id }}</td>
                                    <td class="text-center">{{ $toDo->title }}</td>
                                    <td class="text-center">{{ $toDo->formated_status }}</td>
                                    <td class="text-center">{{ date('d-m-Y', strtotime($toDo->due_date)) }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('toDo.edit', $toDo) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                                        <form action="{{ route('toDo.destroy', $toDo) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">No data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
