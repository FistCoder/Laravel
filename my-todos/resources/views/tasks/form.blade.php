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
                    {{ __('Add new Task') }}

                    @isset($task)
                        <form method="POST" action="{{ route('tasks.update', $task->id) }}">
                            @csrf
                            @method('PUT')

                            <label for="title">Task Name</label><br>

                            <input id="title" type="text" name="title" value="{{ $task->title }}"
                                class="@error('title') is-invalid @enderror"> <br>



                            <label for="description">Task Description</label><br>

                            <textarea id="description" cols="18" rows="1x" name="description"
                                class="@error('description') is-invalid @enderror">
                            {{ $task->description }}
                        </textarea><br>



                            <label for="date">Task Date</label><br>

                            <input id="date" type="date" name="date" value="{{ $task->date }}"
                                class="@error('date') is-invalid @enderror"><br>


                            <label for="state">Task State</label><br>

                            <input id="state" type="select" name="state" value="1" 
                                class="@error('date') is-invalid @enderror"><br>



                            <label for="favourite">Favourite</label><br>

                            <input id="favourite" type="checkbox" name="favourite" value="{{ $task->favourite }}"
                                class="@error('date') is-invalid @enderror"><br>



                            <input type="submit" value="Validate">
                        </form>
                    @else
                        <form method="POST" action="{{ route('tasks.store') }}">
                            @csrf
                            <label for="title">Task Name</label><br>

                            <input id="title" type="text" name="title"
                                class="@error('title') is-invalid @enderror"> <br>



                            <label for="description">Task Description</label><br>

                            <textarea id="description" cols="18" rows="1x" name="description"
                                class="@error('description') is-invalid @enderror"></textarea><br>



                            <label for="date">Task Date</label><br>

                            <input id="date" type="date" name="date"
                                class="@error('date') is-invalid @enderror"><br>



                            <input type="submit" value="Validate">
                        </form>
                    @endisset

                    @csrf


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
