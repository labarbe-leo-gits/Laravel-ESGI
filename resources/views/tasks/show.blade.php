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
            <h1>{{ $task->name }}</h1>
            <flux:button href="{{ route('tasks.index') }}">← Retour aux tâches</flux:button>
            <flux:button href="{{ route('tasks.edit', $task->id) }}">Modifier</flux:button>
        </div>

        <p class="my-4">{{ $task->description }}</p>

        <p class="my-4">Statut :
            @if ($task->status == 1)
                <span class="text-green-600 font-bold">Terminée</span>
            @else
                <span class="text-red-600 font-bold">En cours</span>
            @endif
        </p>

    </div>
</x-layout>