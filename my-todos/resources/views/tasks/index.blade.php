<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p class="mb-2">{{ __('Your Tasks!') }}</p><br>
                    <a href="{{ route('tasks.form') }}" class="p-2 border-2 hover:bg-slate-100">Add new task</a>

                    <table class="mt-2">
                        <thead>
                            <tr>
                                <td class="p-2"></td>
                                <td class="p-2">Title</td>
                                <td class="p-2">Description</td>
                                <td class="p-2">Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td></td>
                                    <td class="p-2"> {{ $task->title }}
                                    </td>
                                    <td class="p-2"> {{ $task->description }}
                                    </td>
                                    <td class="p-2">
                                        <a class="pr-2" href="{{route('tasks.edit' , $task->id)}}">Modify</a>
                                        <a href="">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <br>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
