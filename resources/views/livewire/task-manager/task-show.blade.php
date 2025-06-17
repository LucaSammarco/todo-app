<div class="max-w-4xl mx-auto text-gray-900">`
    <!-- Card principale -->
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden text-gray-900">
        <!-- Header con gradient -->
        <div class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white p-8">
            <div class="flex justify-between items-start gap-6">
                <div class="flex-1">
                    <h1 class="text-4xl font-bold mb-4 leading-tight">{{ $currentTask->title }}</h1>
                    <div class="flex items-center gap-4 text-blue-100">
                        <span class="flex items-center gap-2">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $currentTask->creator->name }}
                        </span>
                        @if($currentTask->due_date)
                            <span class="flex items-center gap-2 {{ $currentTask->due_date->isPast() ? 'text-red-200' : '' }}">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                </svg>
                                {{ $currentTask->due_date->format('d/m/Y') }}
                            </span>
                        @endif
                    </div>
                </div>

                <!-- Status badge -->
                <div class="bg-white/20 backdrop-blur-sm rounded-2xl px-6 py-3">
                    <div class="flex items-center gap-3">
                        <div class="w-3 h-3 rounded-full
                            {{ $currentTask->status === 'pending' ? 'bg-yellow-400 animate-pulse' : '' }}
                            {{ $currentTask->status === 'in_progress' ? 'bg-blue-400 animate-pulse' : '' }}
                            {{ $currentTask->status === 'completed' ? 'bg-green-400' : '' }}">
                        </div>
                        <span class="text-white font-medium">
                            @if($currentTask->status === 'pending') Da fare @endif
                            @if($currentTask->status === 'in_progress') In corso @endif
                            @if($currentTask->status === 'completed') Completata @endif
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contenuto -->
        <div class="p-8">
            @if($currentTask->due_date && $currentTask->due_date->isPast())
                <!-- Alert scadenza -->
                <div class="bg-red-50 border border-red-200 rounded-xl p-4 mb-6 flex items-center gap-3">
                    <div class="text-red-500">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-semibold text-red-800">Task Scaduta</h4>
                        <p class="text-red-600 text-sm">Questa task è scaduta il {{ $currentTask->due_date->format('d/m/Y') }}</p>
                    </div>
                </div>
            @endif

            <!-- Grid con dettagli -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Colonna sinistra -->
                <div class="space-y-6">
                    @if($currentTask->description)
                        <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl p-6 border border-gray-200">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-10 h-10 bg-blue-500 rounded-xl flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900">Descrizione</h3>
                            </div>
                            <p class="text-gray-700 leading-relaxed text-lg">{{ $currentTask->description }}</p>
                        </div>
                    @endif
                </div>

                <!-- Colonna destra -->
                <div class="space-y-6">
                    <!-- Dettagli task -->
                    <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl p-6 border border-blue-200">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-10 h-10 bg-indigo-500 rounded-xl flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900">Dettagli</h3>
                        </div>

                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-4 bg-white rounded-xl shadow-sm">
                                <span class="text-gray-600 font-medium">Creata da</span>
                                <span class="text-gray-900 font-semibold">{{ $currentTask->creator->name }}</span>
                            </div>

                            @if($currentTask->assignee)
                                <div class="flex items-center justify-between p-4 bg-white rounded-xl shadow-sm">
                                    <span class="text-gray-600 font-medium">Assegnata a</span>
                                    <span class="text-gray-900 font-semibold">{{ $currentTask->assignee->name }}</span>
                                </div>
                            @endif

                            @if($currentTask->due_date)
                                <div class="flex items-center justify-between p-4 bg-white rounded-xl shadow-sm">
                                    <span class="text-gray-600 font-medium">Scadenza</span>
                                    <span class="text-gray-900 font-semibold {{ $currentTask->due_date->isPast() ? 'text-red-500' : '' }}">
                                        {{ $currentTask->due_date->format('d/m/Y') }}
                                    </span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer con azioni -->
        <div class="bg-gray-50 px-8 py-6 border-t border-gray-200">
            <div class="flex flex-wrap gap-4 justify-between">
                <a href="{{ route('tasks.index') }}" wire:navigate
                   class="bg-gray-600 hover:bg-gray-700 text-white font-medium py-3 px-6 rounded-xl transition-all duration-200 flex items-center gap-3 shadow-lg hover:shadow-xl">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"></path>
                    </svg>
                    Torna alla lista
                </a>

                @if(auth()->user()->hasRole('manager') || $currentTask->created_by === auth()->id())
                    <div class="flex gap-4">
                        <a href="{{ route('tasks.edit', $currentTask->id) }}" wire:navigate
                           class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-6 rounded-xl transition-all duration-200 flex items-center gap-3 shadow-lg hover:shadow-xl">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                            </svg>
                            Modifica
                        </a>
                        <button wire:click="delete({{ $currentTask->id }})"
                                class="bg-red-600 hover:bg-red-700 text-white font-medium py-3 px-6 rounded-xl transition-all duration-200 flex items-center gap-3 shadow-lg hover:shadow-xl"
                                onclick="return confirm('Sei sicuro di voler eliminare questa task?')">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" clip-rule="evenodd"></path>
                                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3l1.5 1.5a1 1 0 01-1.414 1.414L10 10.414l-1.086 1.086a1 1 0 01-1.414-1.414L9 9V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                                <path d="M14 17a1 1 0 01-1-1V9a1 1 0 012 0v7a1 1 0 01-1 1zM6 17a1 1 0 01-1-1V9a1 1 0 012 0v7a1 1 0 01-1 1z"></path>
                            </svg>
                            Elimina
                        </button>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
