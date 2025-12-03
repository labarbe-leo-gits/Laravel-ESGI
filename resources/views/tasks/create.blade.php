<x-layout>
    <div class="max-w-2xl mx-auto py-8 w-full">
        <a href="{{ route('tasks.index') }}" class="italic text-slate-500">← Retour aux tâches</a>

        <h1 class="mb-6">Créer une nouvelle tâche</h1>

        <form action="/tasks" method="POST" class="space-y-6">
            @csrf
            <flux:input label="Titre de la tâche" placeholder="Ex : Composants React" required name="name"
                :value="old('name')" />
            {{--
            <flux:input label="URL du projet" placeholder="Ex: mon-nouveau-projet" required name="url" /> --}}
            <flux:textarea label="Description de la tâche"
                placeholder="Ex : Créer les composants pour la page d'accueil" name="description">
                {{ old('description') }}</flux:textarea>

            <flux:select label="Projet associé" name="project_id" required>
                <option value="" disabled selected>Choisir un projet</option>
                @foreach($projects as $project)
                    <option value="{{ $project->id }}" {{ old('project_id') == $project->id ? 'selected' : '' }}>
                        {{ $project->title }}
                    </option>
                @endforeach
            </flux:select>

            <flux:button type="submit">Enregistrer la tâche</flux:button>
        </form>
    </div>
</x-layout>