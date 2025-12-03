<x-layout>
    <div class="max-w-2xl mx-auto py-8 w-full">
        @if (session()->has('success'))
            <flux:callout icon="check-circle" variant="success" class="mb-4">
                <flux:callout.heading>{{ session('success') }}</flux:callout.heading>
            </flux:callout>
        @endif

        <a href="{{ route('projects.index') }}" class="italic text-slate-500">← Retour aux projets</a>
        <div class="w-full flex justify-between gap-4">
            <h1>{{ $project->title }}</h1>
            <flux:button href="{{ route('projects.edit', $project->id) }}">Modifier</flux:button>
        </div>
        <p class="my-4">{{ $project->description }}</p>
        @if (isset($project['technologies']) && count($project['technologies']) > 0)
            <ul class="mt-4 list-disc list-inside">
                @foreach ($project['technologies'] as $technologie)
                    <li>{{ $technologie }}</li>
                @endforeach
            </ul>
        @endif

        <p>Technologies via la base de données</p>
        <ul class="mt-4 list-disc list-inside mb-10">
            @if ($project->techs->count() <= 0)
                <li>Aucune technologie associée.</li>
            @endif
            @foreach ($project->techs as $technology)
                <li>{{ $technology->name }}</li>
            @endforeach

        </ul>

        <h3 class="font-bold mt-10">Tâches du projet</h3>
        <div class="mt-4">
            @if ($project->tasks->count() <= 0)
                <p>Aucune tâche associée.</p>
            @endif
            @foreach ($project->tasks as $task)
                <div class="flex items-center bg-gray-200 p-4 rounded mb-2 @if($task->status == 1) opacity-50 line-through @endif">
                    <p>{{ $task->name }}
                        @if ($task->status == 0)
                        <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="inline-block ml-4">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="name" value="{{ $task->name }}">
                            <input type="hidden" name="description" value="{{ $task->description }}">
                            <input type="hidden" name="status" value="1">
                            <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded">✓</button>
                        </form>
                        @endif
                    </p>
                </div>
            @endforeach
            </div>

        <form action="{{ route('projects.destroy', $project->id) }}" method="POST">
            @csrf
            @method('DELETE')

            <flux:button type="submit" variant="danger" class="mt-6">
                Supprimer le projet
            </flux:button>

        </form>
    </div>
</x-layout>
