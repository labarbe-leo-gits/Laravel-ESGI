<x-layout>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}, vous allez être redirigé(e)...
        </div>
        <script>
            setTimeout(function () {
                window.location.href = "{{ route('tasks.show', $task->id) }}";
            }, 2000);
        </script>
    @endif

    <div class="max-w-2xl mx-auto py-8 w-full">
        <a href="{{ route('tasks.show', $task->id) }}" class="italic text-slate-500">← Quitter l'édition</a>
        <h1 class="mb-6">Modifier la tâche</h1>
        <form action="/tasks/{{ $task->id }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            <flux:input label="Titre de la tâche" placeholder="Ex : Ma super tâche" required name="name"
                :value="old('title', $task->name)" />
            {{--
            <flux:input label="URL du projet" placeholder="Ex: mon-nouveau-projet" required name="url" /> --}}
            <flux:textarea label="Description de la tâche" placeholder="Ex : Ma tâche porte sur..." name="description">
                {{ old('description', $task->description) }}
            </flux:textarea>

            <flux:select label="Projet associé" name="project_id" required>
                <option value="" disabled selected>Choisir un projet</option>
                @foreach($projects as $project)
                    <option @if($project->id === $task->project->id) selected @endif value="{{ $project->id }}" {{ old('project_id') == $project->id ? 'selected' : '' }}>
                        {{ $project->title }}
                    </option>
                @endforeach
            </flux:select>

            <flux:button type="submit">Enregistrer la tâche</flux:button>
        </form>

        <flux:separator class="my-8" />

        <form action="/tasks/{{ $task->id }}" method="POST"
            onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette tâche ?')">
            @csrf
            @method('DELETE')

            <flux:button variant="danger" type="submit">
                Supprimer
            </flux:button>
        </form>
    </div>
</x-layout>