<?php

use Illuminate\Support\Facades\Route;

//Admin - prefix
use App\Http\Controllers\Admin\AdicionalController;
use App\Http\Controllers\Admin\AutoAdicionalController;
use App\Http\Controllers\Admin\AutoController;
use App\Http\Controllers\Admin\CiudadController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\MarcaController;
use App\Http\Controllers\Admin\ModeloController;
use App\Http\Controllers\Admin\PaisController;

//Authentication - Admin
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use Illuminate\Auth\Events\Logout;

Route::group([
    'excluded_middleware' => ['auth'],
], function(){
    // Login & Registro
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class,'store'])->name('login.store');

    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

    Route::post('/logout', [LogoutController::class, 'store'])->name('logout.store');
});

Route::group(['as' => 'admin.'], function(){
    //Dashboard
    Route::get("/",[HomeController::class,"index"])->name('dashboard');

    //Paises
    Route::resource('paises', PaisController::class)->except('show');
    //Ciudades
    Route::resource('ciudades', CiudadController::class)->except('show');
    //Marcas
    Route::resource('marcas', MarcaController::class)->except('show');
    //Modelos
    Route::resource('modelos', ModeloController::class)->except('show');

    //Autos
    Route::resource('autos', AutoController::class)->except('show');

    //Adicionales
    Route::resource('adicionales', AdicionalController::class)->except('show');
    // Route::group(['as'=> 'adicionales'], function(){
    //     Route::get('/adicionales', [AdicionalController::class, 'index'])->name('adicionales.index');
    //     Route::get('/adicionales/create', [AdicionalController::class,'create'])->name('adicionales.create');
    // });

    //AutoAdicional
    Route::prefix('autos')->as('autos.')->group(function(){
        // Route::get('/adicionales/{auto:placas}', [AutoAdicionalController::class,'show'])->name('adicionales.show');
        Route::resource('adicionales', AutoAdicionalController::class)
            ->parameters([
                'adicionales' => 'auto:placas'
            ]);
    });

});

