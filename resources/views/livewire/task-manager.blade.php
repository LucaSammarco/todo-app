<div class="h-full flex flex-col">
    <!-- Flash Messages compatti -->
    @if (session('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-3 py-2 mx-2 mt-2 rounded text-sm flex-shrink-0">
            {{ session('message') }}
        </div>
    @endif

    @if (session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-3 py-2 mx-2 mt-2 rounded text-sm flex-shrink-0">
            {{ session('error') }}
        </div>
    @endif

    <!-- Vista basata sulla rotta corrente -->
    @if ($currentView === 'create' || $currentView === 'edit')
        <div class="flex-1 p-4">
            @include('livewire.task-manager.task-form')
        </div>
    @elseif ($currentView === 'show')
        <div class="flex-1 p-4">
            @include('livewire.task-manager.task-show')
        </div>
    @else
        @include('livewire.task-manager.task-list')
    @endif

    <!-- Modale Eliminazione -->
    @if($showDeleteModal && $taskToDelete)
        <div class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50">
            <div class="bg-white rounded-lg shadow-lg border border-gray-300 p-6 w-80">
                <div class="text-center">
                    <div class="text-orange-500 text-3xl mb-3">⚠️</div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Eliminare task?</h3>
                    <p class="text-gray-600 text-sm mb-4">"{{ $taskToDelete->title }}"</p>

                    <div class="flex gap-2">
                        <button wire:click="cancelDelete"
                                class="flex-1 px-3 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded text-sm transition-colors">
                            Annulla
                        </button>
                        <button wire:click="delete"
                                class="flex-1 px-3 py-2 bg-red-500 hover:bg-red-600 text-white rounded text-sm transition-colors">
                            Elimina
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
