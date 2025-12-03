<x-layout>
    <div class="max-w-2xl mx-auto py-8 w-full">
        @if (session()->has('success'))
            <flux:callout icon="check-circle" variant="success" class="mb-4">
                <flux:callout.heading>{{ session('success') }}</flux:callout.heading>
            </flux:callout>
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
                <div class="flex items-center bg-gray-200 p-4 rounded mb-2 ">
                    <p>
                        @if($task->status == 1)
                            <span class="bg-green-200 rounded p-1">✓</span>
                        @endif
                        {{ $task->name }}
                        <flux:button href="{{ route('tasks.show', $task->id) }}" class="ml-4">Voir</flux:button>
                        <flux:button href="{{ route('tasks.edit', $task->id) }}" class="ml-4">Modifier</flux:button>
                    </p>
                </div>
            @endforeach
        </div>
        
    </div>
</x-layout>
