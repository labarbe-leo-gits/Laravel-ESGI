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
        <ul class="mt-4 list-disc list-inside">
            @if ($project->techs->count() <= 0)
                <li>Aucune technologie associée.</li>
            @endif
            @foreach ($project->techs as $technology)
                <li>{{ $technology->name }}</li>
            @endforeach

        <form action="{{ route('projects.destroy', $project->id) }}" method="POST">
            @csrf
            @method('DELETE')

            <flux:button type="submit" variant="danger" class="mt-6">
                Supprimer le projet
            </flux:button>

        </form>
    </div>
</x-layout>
