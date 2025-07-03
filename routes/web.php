<?php

use App\Livewire\Roles\RoleEdit;
use App\Livewire\Users\UserEdit;
use App\Livewire\Users\UserShow;
use App\Livewire\Roles\RoleIndex;
use App\Livewire\Users\UserIndex;
use App\Livewire\Roles\RoleCreate;
use App\Livewire\Settings\Profile;
use App\Livewire\Users\UserCreate;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Appearance;
use Illuminate\Support\Facades\Route;
use App\Livewire\Permissions\PermissionEdit;
use App\Livewire\Permissions\PermissionIndex;
use App\Livewire\Permissions\PermissionCreate;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

Route::middleware(['auth', 'verified'])->group(function () {
    // Personalize as URIs conforme desejar, por exemplo:
    Route::get('usuarios', UserIndex::class)->name('users.index');
    Route::get('usuarios/novo', UserCreate::class)->name('users.create');
    Route::get('usuarios/{id}/editar', UserEdit::class)->name('users.edit');
    Route::get('usuarios/{id}/mostrar', UserShow::class)->name('users.show');

    Route::get('funcoes', RoleIndex::class)->name('roles.index');
    Route::get('funcoes/criar', RoleCreate::class)->name('roles.create');
    Route::get('funcoes/{id}/editar', RoleEdit::class)->name('roles.edit');

    Route::get('permissoes', PermissionIndex::class)->name('permissions.index');
    Route::get('permissoes/criar', PermissionCreate::class)->name('permissions.create');
    Route::get('permissoes/{id}/editar', PermissionEdit::class)->name('permissions.edit');
});

require __DIR__.'/auth.php';
