<div class="bg-white border border-gray-200 rounded-xl p-4 shadow-sm hover:shadow-lg transition-all duration-200 hover:bg-gray-50 hover:border-gray-300">
    <!-- Header con titolo e status -->
    <div class="flex justify-between items-start mb-3 gap-3">
        <h4 class="font-semibold text-sm text-gray-900 leading-tight flex-1">{{ $task->title }}</h4>

        <!-- Status selector solo per l'assegnatario -->
        @if($task->assigned_to === auth()->id())
            <select wire:change="updateTaskStatus({{ $task->id }}, $event.target.value)"
                    class="text-xs border border-gray-300 bg-white px-2 py-1 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent cursor-pointer">
                <option value="pending" {{ $task->status === 'pending' ? 'selected' : '' }}>Da fare</option>
                <option value="in_progress" {{ $task->status === 'in_progress' ? 'selected' : '' }}>In corso</option>
                <option value="completed" {{ $task->status === 'completed' ? 'selected' : '' }}>Completata</option>
            </select>
        @else
            <span class="text-xs px-3 py-1 rounded-full font-medium whitespace-nowrap
                {{ $task->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                {{ $task->status === 'in_progress' ? 'bg-blue-100 text-blue-800' : '' }}
                {{ $task->status === 'completed' ? 'bg-green-100 text-green-800' : '' }}">
                @if($task->status === 'pending') Da fare @endif
                @if($task->status === 'in_progress') In corso @endif
                @if($task->status === 'completed') Completata @endif
            </span>
        @endif
    </div>

    <!-- Descrizione -->
    @if($task->description)
        <p class="text-sm text-gray-600 mb-4 leading-relaxed">{{ Str::limit($task->description, 80) }}</p>
    @endif

    <!-- Informazioni task -->
    <div class="space-y-2 mb-4 text-xs text-gray-500">
        <div class="flex items-center gap-2">
            <span class="text-gray-400">👤</span>
            <span>{{ $task->creator->name }}</span>
        </div>
        @if($task->assignee && $task->assignee->id !== $task->creator->id)
            <div class="flex items-center gap-2">
                <span class="text-gray-400">📝</span>
                <span>Assegnata a: {{ $task->assignee->name }}</span>
            </div>
        @endif
        @if($task->due_date)
            <div class="flex items-center gap-2 {{ $task->due_date->isPast() ? 'text-red-500 font-medium' : '' }}">
                <span class="text-gray-400">📅</span>
                <span>{{ $task->due_date->format('d/m/Y') }}</span>
                @if($task->due_date->isPast())
                    <span class="text-red-500 font-semibold ml-1">SCADUTA</span>
                @endif
            </div>
        @endif
    </div>

    <!-- Azioni -->
    <div class="flex flex-wrap gap-2 text-xs border-t border-gray-100 pt-3">
        <a href="{{ route('tasks.show', $task->id) }}" wire:navigate
           class="bg-gray-100 hover:bg-gray-200 px-3 py-1.5 rounded-md cursor-pointer transition-colors duration-150 font-medium">
            👁️ Vedi
        </a>

        @if(auth()->user()->hasRole('manager') || $task->created_by === auth()->id())
            <a href="{{ route('tasks.edit', $task->id) }}" wire:navigate
               class="bg-blue-50 hover:bg-blue-100 text-blue-700 px-3 py-1.5 rounded-md transition-colors duration-150 font-medium">
                ✏️ Modifica
            </a>
            <button wire:click="confirmDelete({{ $task->id }})"
                    class="bg-red-50 hover:bg-red-100 text-red-700 px-3 py-1.5 rounded-md transition-colors duration-150 font-medium">
                🗑️ Elimina
            </button>
        @endif
    </div>
</div>
