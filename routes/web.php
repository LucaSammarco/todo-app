<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\TaskManager;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::redirect('dashboard', 'tasks')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {

    // Task routes con wire:navigate
    Route::get('/tasks', TaskManager::class)->name('tasks.index');
    Route::get('/tasks/create', TaskManager::class)->name('tasks.create');
    Route::get('/tasks/{id}', TaskManager::class)->name('tasks.show')->where('id', '[0-9]+');
    Route::get('/tasks/{id}/edit', TaskManager::class)->name('tasks.edit')->where('id', '[0-9]+');

    // Settings
    Route::redirect('settings', 'settings/profile');
    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';
