<?php

namespace App\Livewire;

use App\Models\Task;
use App\Models\User;
use Livewire\Component;

class TaskManager extends Component
{
    public $tasks = [];
    public $users = [];
    public $title = '';
    public $description = '';
    public $due_date = '';
    public $assigned_to = '';
    public $status = 'pending';
    public $task_id = null;

    // Determina quale vista mostrare in base alla rotta corrente
    public $currentView = 'list'; // list, show, edit, create
    public $currentTask = null;

    // Modale di conferma eliminazione
    public $showDeleteModal = false;
    public $taskToDelete = null;

    public function mount($id = null)
    {
        $this->loadTasks();

        // Carica lista utenti per i manager
        if (auth()->user()->hasRole('manager')) {
            $this->users = User::orderBy('name')->get();
        }

        // Determina la vista corrente in base alla rotta
        $this->determineCurrentView($id);
    }

    public function determineCurrentView($id = null)
    {
        $route = request()->route();
        $routeName = $route->getName();

        switch ($routeName) {
            case 'tasks.create':
                $this->currentView = 'create';
                $this->clearForm();
                break;

            case 'tasks.show':
                $this->currentView = 'show';
                $this->loadTaskForShow($id);
                break;

            case 'tasks.edit':
                $this->currentView = 'edit';
                $this->loadTaskForEdit($id);
                break;

            default:
                $this->currentView = 'list';
                break;
        }
    }

    public function loadTasks()
    {
        $user = auth()->user();

        if ($user->hasRole('manager')) {
            // Manager vede tutte le task
            $this->tasks = Task::with(['creator', 'assignee'])->latest()->get();
        } else {
            // Employee vede solo task create da lui o assegnate a lui
            $this->tasks = Task::with(['creator', 'assignee'])
                ->where(function($query) use ($user) {
                    $query->where('created_by', $user->id)
                          ->orWhere('assigned_to', $user->id);
                })
                ->latest()
                ->get();
        }
    }

    public function updateTaskStatus($taskId, $newStatus)
    {
        $task = Task::findOrFail($taskId);
        $user = auth()->user();

        // Solo l'assegnatario può cambiare lo status della task
        if ($task->assigned_to !== $user->id) {
            session()->flash('error', 'Non puoi modificare lo status di questa task');
            return;
        }

        // Valida lo status
        if (!in_array($newStatus, ['pending', 'in_progress', 'completed'])) {
            session()->flash('error', 'Status non valido');
            return;
        }

        $task->update(['status' => $newStatus]);
        $this->loadTasks();


    }

    public function loadTaskForShow($id)
    {
        $task = Task::with(['creator', 'assignee'])->find($id);

        if (!$task) {
            return redirect()->route('tasks.index');
        }

        $user = auth()->user();

        // Verifica permessi
        if (!$user->hasRole('manager')) {
            if ($task->created_by !== $user->id && $task->assigned_to !== $user->id) {
                session()->flash('error', 'Non puoi visualizzare questa task');
                return redirect()->route('tasks.index');
            }
        }

        $this->currentTask = $task;
    }

    public function loadTaskForEdit($id)
    {
        $task = Task::find($id);

        if (!$task) {
            return redirect()->route('tasks.index');
        }

        $user = auth()->user();

        // Verifica permessi
        if (!$user->hasRole('manager') && $task->created_by !== $user->id) {
            session()->flash('error', 'Non puoi modificare questa task');
            return redirect()->route('tasks.index');
        }

        $this->currentTask = $task;
        $this->task_id = $task->id;
        $this->title = $task->title;
        $this->description = $task->description;
        $this->due_date = optional($task->due_date)->format('Y-m-d');
        $this->assigned_to = $task->assigned_to;
        $this->status = $task->status;
    }

    public function save()
    {
        $data = $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date|after_or_equal:today',
            'assigned_to' => 'nullable|exists:users,id',
            'status' => 'nullable|in:pending,in_progress,completed',
        ], [
            'title.required' => 'Il titolo è obbligatorio.',
            'due_date.after_or_equal' => 'La data di scadenza deve essere oggi o nel futuro.',
            'due_date.date' => 'Inserisci una data valida.',
            'assigned_to.exists' => 'L\'utente selezionato non esiste.',
        ]);

        // Converti stringa vuota in null per due_date
        if (empty($this->due_date)) {
            $data['due_date'] = null;
        }

        $user = auth()->user();

        if ($this->task_id) {
            // Update existing task
            $task = Task::findOrFail($this->task_id);

            // Verifica permessi
            if (!$user->hasRole('manager') && $task->created_by !== $user->id) {
                session()->flash('error', 'Non puoi modificare questa task');
                return redirect()->route('tasks.index');
            }

            $task->update($data);
            $message = 'Task aggiornata con successo';
        } else {
            // Create new task
            Task::create([
                'title' => $this->title,
                'description' => $this->description,
                'due_date' => empty($this->due_date) ? null : $this->due_date,
                'assigned_to' => $this->assigned_to ?: $user->id,
                'status' => $this->status ?: 'pending',
                'created_by' => $user->id,
            ]);
            $message = 'Task creata con successo';
        }

        session()->flash('message', $message);
        return redirect()->route('tasks.index');
    }

    // Metodi per la modale di eliminazione
    public function confirmDelete($id)
    {
        $task = Task::findOrFail($id);
        $user = auth()->user();

        // Verifica permessi
        if (!$user->hasRole('manager') && $task->created_by !== $user->id) {
            session()->flash('error', 'Non puoi eliminare questa task');
            return;
        }

        $this->taskToDelete = $task;
        $this->showDeleteModal = true;
    }

    public function cancelDelete()
    {
        $this->showDeleteModal = false;
        $this->taskToDelete = null;
    }

    public function delete($id = null)
    {
        $taskId = $id ?? $this->taskToDelete->id;
        $task = Task::findOrFail($taskId);
        $user = auth()->user();

        // Verifica permessi
        if (!$user->hasRole('manager') && $task->created_by !== $user->id) {
            session()->flash('error', 'Non puoi eliminare questa task');
            return;
        }

        $task->delete();
        session()->flash('message', 'Task eliminata con successo');

        // Chiudi la modale e ricarica le task
        $this->showDeleteModal = false;
        $this->taskToDelete = null;

        // Se siamo nella vista show/edit della task eliminata, torna alla lista
        if ($this->currentView !== 'list') {
            return redirect()->route('tasks.index');
        }

        $this->loadTasks();
    }

    public function clearForm()
    {
        $this->reset('task_id', 'title', 'description', 'due_date', 'assigned_to', 'status');
        $this->status = 'pending';
        $this->currentTask = null;
    }

    public function render()
    {
        return view('livewire.task-manager');
    }
}
