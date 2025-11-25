<?php

namespace Modules\Auth\Http\Routes;

use Illuminate\Support\Facades\Route;
use Modules\Auth\Http\Controllers\Api\AuthController;

Route::prefix('auth')->group(function () {
    Route::get('/', [AuthController::class,'login'])->name('login');
});