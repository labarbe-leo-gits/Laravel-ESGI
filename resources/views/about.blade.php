<x-layout>
    <p>Bienvenue sur about</p>

        <div class="space-y-4">
        <h1 class="text-3xl font-bold text-gray-900">Test des classes Tailwind</h1>

        <!-- Boutons personnalisés -->
        <div class="flex gap-4">
            <button class="btn btn-primary">Bouton Primary</button>
            <button class="btn btn-secondary">Bouton Secondary</button>
        </div>

        <!-- Card personnalisée -->
        <div class="card">
            <h2 class="text-xl font-semibold mb-2">Titre de la carte</h2>
            <p class="text-gray-600">Contenu de la carte avec classe personnalisée.</p>
        </div>

        <!-- Couleurs personnalisées -->
        <div class="grid grid-cols-5 gap-2">
            <div class="h-20 bg-primary-100 rounded"></div>
            <div class="h-20 bg-primary-300 rounded"></div>
            <div class="h-20 bg-primary-500 rounded"></div>
            <div class="h-20 bg-primary-700 rounded"></div>
            <div class="h-20 bg-primary-900 rounded"></div>
        </div>

        <div
            x-data="{
                open: false,
            }"
        >
            <button class="btn btn-primary" x-on:click="open = !open">Toggle data</button>
            <div x-show="open">Hello secret content</div>
        </div>
    </div>
</x-layout>
