<div class="flex flex-col h-full">
    <!-- Header compatto -->
    <div class="bg-white shadow-sm p-3 flex-shrink-0">
        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-2">
            <h2 class="text-xl font-bold text-gray-900">
                @if(auth()->user()->hasRole('manager'))
                    Tutte le task
                @else
                    Le mie task
                @endif
            </h2>
            <a href="{{ route('tasks.create') }}" wire:navigate
               class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-lg transition-colors duration-200 text-sm">
                + Nuova Task
            </a>
        </div>
    </div>

    @if($tasks->isEmpty())
        <div class="flex-1 flex items-center justify-center p-4">
            <div class="text-center">
                <div class="text-gray-400 text-4xl mb-2">📝</div>
                <p class="text-gray-500">Nessuna task trovata.</p>
                <p class="text-gray-400 text-sm mt-1">Inizia creando la tua prima task!</p>
            </div>
        </div>
    @else
        <!-- Kanban Board compatto -->
        <div class="flex-1 p-2">
            <!-- Mobile: Layout verticale con scroll -->
            <div class="block md:hidden h-full overflow-y-auto">
                <div class="space-y-6 pb-6">
                    <!-- Sezione PENDING Mobile -->
                    <div class="bg-gradient-to-br from-yellow-50 to-yellow-100 rounded-xl border border-yellow-200 shadow-md">
                        <div class="p-4 border-b border-yellow-200">
                            <h3 class="font-bold text-lg text-yellow-800 flex items-center">
                                <span class="w-3 h-3 bg-yellow-500 rounded-full mr-3"></span>
                                Da fare ({{ $tasks->where('status', 'pending')->count() }})
                            </h3>
                        </div>
                        <div class="p-4 space-y-3">
                            @forelse ($tasks->where('status', 'pending') as $task)
                                @include('livewire.task-manager.task-card', ['task' => $task])
                            @empty
                                <p class="text-yellow-600 text-sm italic">Nessuna task da fare</p>
                            @endforelse
                        </div>
                    </div>

                    <!-- Sezione IN PROGRESS Mobile -->
                    <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl border border-blue-200 shadow-md">
                        <div class="p-4 border-b border-blue-200">
                            <h3 class="font-bold text-lg text-blue-800 flex items-center">
                                <span class="w-3 h-3 bg-blue-500 rounded-full mr-3"></span>
                                In corso ({{ $tasks->where('status', 'in_progress')->count() }})
                            </h3>
                        </div>
                        <div class="p-4 space-y-3">
                            @forelse ($tasks->where('status', 'in_progress') as $task)
                                @include('livewire.task-manager.task-card', ['task' => $task])
                            @empty
                                <p class="text-blue-600 text-sm italic">Nessuna task in corso</p>
                            @endforelse
                        </div>
                    </div>

                    <!-- Sezione COMPLETED Mobile -->
                    <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-xl border border-green-200 shadow-md">
                        <div class="p-4 border-b border-green-200">
                            <h3 class="font-bold text-lg text-green-800 flex items-center">
                                <span class="w-3 h-3 bg-green-500 rounded-full mr-3"></span>
                                Completate ({{ $tasks->where('status', 'completed')->count() }})
                            </h3>
                        </div>
                        <div class="p-4 space-y-3">
                            @forelse ($tasks->where('status', 'completed') as $task)
                                @include('livewire.task-manager.task-card', ['task' => $task])
                            @empty
                                <p class="text-green-600 text-sm italic">Nessuna task completata</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

            <!-- Desktop: Layout a 3 colonne con scroll interno -->
            <div class="hidden md:grid md:grid-cols-3 gap-6 h-full">
                <!-- Colonna PENDING -->
                <div class="bg-gradient-to-br from-yellow-50 to-yellow-100 rounded-xl border border-yellow-200 shadow-lg flex flex-col overflow-hidden">
                    <div class="p-6 border-b border-yellow-200 flex-shrink-0">
                        <h3 class="font-bold text-xl text-yellow-800 flex items-center">
                            <span class="w-4 h-4 bg-yellow-500 rounded-full mr-3 shadow-sm"></span>
                            Da fare ({{ $tasks->where('status', 'pending')->count() }})
                        </h3>
                    </div>
                    <div class="p-6 flex-1 overflow-y-auto">
                        <div class="space-y-4">
                            @forelse ($tasks->where('status', 'pending') as $task)
                                @include('livewire.task-manager.task-card', ['task' => $task])
                            @empty
                                <div class="text-center py-8">
                                    <div class="text-yellow-400 text-4xl mb-2">📝</div>
                                    <p class="text-yellow-600 text-sm">Nessuna task da fare</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- Colonna IN PROGRESS -->
                <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl border border-blue-200 shadow-lg flex flex-col overflow-hidden">
                    <div class="p-6 border-b border-blue-200 flex-shrink-0">
                        <h3 class="font-bold text-xl text-blue-800 flex items-center">
                            <span class="w-4 h-4 bg-blue-500 rounded-full mr-3 shadow-sm"></span>
                            In corso ({{ $tasks->where('status', 'in_progress')->count() }})
                        </h3>
                    </div>
                    <div class="p-6 flex-1 overflow-y-auto">
                        <div class="space-y-4">
                            @forelse ($tasks->where('status', 'in_progress') as $task)
                                @include('livewire.task-manager.task-card', ['task' => $task])
                            @empty
                                <div class="text-center py-8">
                                    <div class="text-blue-400 text-4xl mb-2">⚡</div>
                                    <p class="text-blue-600 text-sm">Nessuna task in corso</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- Colonna COMPLETED -->
                <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-xl border border-green-200 shadow-lg flex flex-col overflow-hidden">
                    <div class="p-6 border-b border-green-200 flex-shrink-0">
                        <h3 class="font-bold text-xl text-green-800 flex items-center">
                            <span class="w-4 h-4 bg-green-500 rounded-full mr-3 shadow-sm"></span>
                            Completate ({{ $tasks->where('status', 'completed')->count() }})
                        </h3>
                    </div>
                    <div class="p-6 flex-1 overflow-y-auto">
                        <div class="space-y-4">
                            @forelse ($tasks->where('status', 'completed') as $task)
                                @include('livewire.task-manager.task-card', ['task' => $task])
                            @empty
                                <div class="text-center py-8">
                                    <div class="text-green-400 text-4xl mb-2">✅</div>
                                    <p class="text-green-600 text-sm">Nessuna task completata</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
