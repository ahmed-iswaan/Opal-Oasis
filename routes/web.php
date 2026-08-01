<?php

use App\Livewire\Pages\Admin\Permissions;
use App\Livewire\Pages\Admin\Roles;
use App\Livewire\Pages\Admin\Users;
use App\Livewire\Pages\Dashboard;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (app()->isDownForMaintenance()) {
        return response()->view('maintenance', [], 503);
    }

    return response()
        ->view('welcome')
        ->header('Cache-Control', 'public, max-age=300, stale-while-revalidate=86400');
})->name('home');

Route::get('/rooms/{room}', function (string $room) {
    $roomDetails = config('rooms.'.$room);

    abort_unless($roomDetails, 404);

    return view('rooms.show', ['room' => $roomDetails]);
})->whereIn('room', array_keys(config('rooms')))->name('rooms.show');

if (config('auth.enabled')) {
    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('dashboard', Dashboard::class)
            ->middleware('permission:view dashboard')
            ->name('dashboard');

        Route::get('admin/users', Users::class)
            ->middleware('permission:users.view')
            ->name('admin.users');

        Route::get('admin/roles', Roles::class)
            ->middleware('permission:roles.view')
            ->name('admin.roles');

        Route::get('admin/permissions', Permissions::class)
            ->middleware('permission:permissions.view')
            ->name('admin.permissions');
    });

    require __DIR__.'/settings.php';
}
