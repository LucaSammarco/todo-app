{{-- Placeholder quando nessuna task è selezionata --}}
<div class="bg-gray-50 rounded-lg border-2 border-dashed border-gray-300 p-12 text-center">
    <div class="text-6xl mb-4">📋</div>
    <h3 class="text-lg font-medium text-gray-900 mb-2">Gestione Task</h3>
    <p class="text-gray-600 mb-6">
        Seleziona una task dalla lista per visualizzare i dettagli<br>
        o clicca "Nuova Task" per crearne una.
    </p>

    <div class="flex flex-col sm:flex-row gap-3 justify-center">
        <button wire:click="resetForm"
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-medium">
            ✨ Crea Nuova Task
        </button>

        @if($tasks->count() > 0)
            <button wire:click="show({{ $tasks->first()->id }})"
                    class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-3 rounded-lg font-medium">
                👁️ Visualizza Prima Task
            </button>
        @endif
    </div>

    <div class="mt-8 text-sm text-gray-500">
        <p><strong>💡 Suggerimento:</strong> Usa i bottoni nella lista per azioni rapide</p>
    </div>
</div>
