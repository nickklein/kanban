<?php

use Illuminate\Support\Facades\Route;
use NickKlein\Kanban\Controllers\KanbanController;

Route::middleware(['web', 'auth'])->group(function () {
    Route::group(['prefix' => 'todo'], function () {
        Route::get('/', [KanbanController::class, 'index'])->name('kanban.index');
    });
});
