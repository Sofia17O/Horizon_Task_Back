<?php

use App\Http\Modules\Usuarios\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('usuarios')->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::get('listarUsuarios', 'listarUsuarios');
        Route::get('buscarUsuario/{idUsuario}', 'buscarUsuario');
        Route::post('crearUsuario', 'crearUsuario');
        Route::put('actualizarUsuario/{idUsuario}', 'actualizarUsuario');
    });
});
