<x-layout>
    <div class="max-w-2xl mx-auto py-8 w-full">
        @if (session()->has('success'))
            <div class="mb-4">
                <div x-data="{ visible: true }" x-show="visible" x-collapse>
                    <div x-show="visible" x-transition>
                        <flux:callout icon="check-circle" color="green">
                            <flux:callout.heading>{{ session('success') }}</flux:callout.heading>

                            <x-slot name="controls">
                                <flux:button icon="x-mark" variant="ghost" x-on:click="visible = false" />
                            </x-slot>
                        </flux:callout>
                    </div>
                </div>
            </div>
        @endif

        <div class="w-full flex justify-between gap-4">
            <h1>Tâches</h1>
            <flux:button href="{{ route('tasks.create') }}">Créer une tâche</flux:button>
        </div>

        <div class="mt-4">
            @if ($tasks->count() <= 0)
                <p>Aucune tâche disponible.</p>
            @endif
            @foreach ($tasks as $task)
                <div class="flex items-center bg-gray-200 p-4 rounded mb-2 space-x-4">
                    <div class="@if($task->status) opacity-50 line-through @endif flex-1">
                        {{ $task->name }}
                    </div>
                    <div class="flex space-x-2">
                        <flux:button href="{{ route('tasks.show', $task->id) }}">
                            Voir
                        </flux:button>

                        <flux:button href="{{ route('tasks.edit', $task->id) }}">
                            Modifier
                        </flux:button>

                        <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="name" value="{{ $task->name }}">
                            <input type="hidden" name="description" value="{{ $task->description }}">
                            <input type="hidden" name="status" value="{{ $task->status ? 0 : 1 }}">

                            <flux:button type="submit"
                                class="px-3 py-2 bg-gray-500 text-white rounded flex items-center justify-center">
                                <flux:icon.check-circle variant="{{ $task->status ? 'solid' : 'outline' }}" />
                            </flux:button>
                        </form>
                    </div>

                </div>
            @endforeach

        </div>

    </div>
</x-layout>