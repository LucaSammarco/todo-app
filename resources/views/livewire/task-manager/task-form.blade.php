<div class="bg-white p-6 rounded-lg shadow-lg">
    <h2 class="text-3xl font-bold text-gray-900 mb-6">{{ $currentView === 'edit' ? 'Modifica' : 'Nuova' }} Task</h2>

    <form wire:submit.prevent="save" class="space-y-6">
        <!-- Titolo -->
        <div>
            <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">Titolo *</label>
            <input type="text" id="title" wire:model="title" placeholder="Inserisci il titolo della task"
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
            @error('title') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
        </div>

        <!-- Descrizione -->
        <div>
            <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">Descrizione</label>
            <textarea id="description" wire:model="description" placeholder="Inserisci una descrizione (opzionale)" rows="4"
                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 resize-none"></textarea>
            @error('description') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
        </div>

        <!-- Data scadenza -->
        <div>
            <label for="due_date" class="block text-sm font-semibold text-gray-700 mb-2">Data di scadenza</label>
            <input type="date" id="due_date" wire:model="due_date"
                   min="{{ date('Y-m-d') }}"
                   lang="it-IT"
                   data-date-format="dd/mm/yyyy"
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-transparent transition-all duration-200">
            @error('due_date') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
            <p class="text-xs text-gray-500 mt-1">Formato: gg/mm/aaaa - La data deve essere oggi o nel futuro</p>
        </div>

        @if(auth()->user()->hasRole('manager'))
            <!-- Assegnazione (solo per manager) -->
            <div>
                <label for="assigned_to" class="block text-sm font-semibold text-gray-700 mb-2">Assegna a</label>
                <select id="assigned_to" wire:model="assigned_to"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                    <option value="">Seleziona un utente...</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
                @error('assigned_to') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
            </div>

            @if($currentView === 'edit')
                <!-- Status (solo in modifica per manager) -->
                <div>
                    <label for="status" class="block text-sm font-semibold text-gray-700 mb-2">Status</label>
                    <select id="status" wire:model="status"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                        <option value="pending">Da fare</option>
                        <option value="in_progress">In corso</option>
                        <option value="completed">Completata</option>
                    </select>
                    @error('status') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                </div>
            @endif
        @endif

        <!-- Pulsanti azione -->
        <div class="flex flex-wrap gap-3 pt-6 border-t border-gray-200">
            <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-3 px-6 rounded-lg transition-colors duration-200">
                {{ $currentView === 'edit' ? 'Aggiorna' : 'Crea' }} Task
            </button>
            <a href="{{ route('tasks.index') }}" wire:navigate
               class="bg-gray-500 hover:bg-gray-600 text-white font-medium py-3 px-6 rounded-lg transition-colors duration-200">
                Annulla
            </a>
        </div>
    </form>
</div>
