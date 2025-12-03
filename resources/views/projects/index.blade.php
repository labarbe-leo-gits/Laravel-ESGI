<x-layout>
    <h1>Bienvenue sur la page Projects</h1>

    @if (session()->has('success'))
        <div class="m-3">
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

    <ul class="mt-4 list-disc list-inside">
        @foreach ($projects as $project)
            <li><a href="{{ route('projects.show', $project->id) }}"
                    class="underline text-blue-800">{{ $project['title'] }}</a></li>
        @endforeach
    </ul>

    <flux:button href="{{ route('projects.create') }}" class="w-32">Créer un projet</flux:button>

</x-layout>