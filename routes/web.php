<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecetaController;
use App\Http\Controllers\SobrenosotrosController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
Aquí es donde  se puede registrar rutas web para la aplicación. Estas rutas
son cargadas por el RouteServiceProvider y todas ellas serán asignadas al
grupo de middleware "web"
*/

Route::get('/', function () {
    return view('bienvenida');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');


Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Ruta para mostrar el formulario de creación de comentarios
    Route::get('/recetas/{receta}/comentarios/create', 'ComentarioController@create')->name('comentarios.create');
    // Ruta para almacenar el comentario en la base de datos
    Route::post('/recetas/{receta}/comentarios', 'ComentarioController@store')->name('comentarios.store');


    Route::get('/recetas/buscar', 'RecetaController@buscar')->name('recetas.buscar');
    Route::get('/recetas/buscarAvanzada', 'RecetaController@buscarAvanzada')->name('recetas.buscarAvanzada');
   
    Route::get('/sobre-nosotros', [SobrenosotrosController::class. 'index'])->name('sobre-nosotros');
    Route::post('/contacto/contacto', 'ContactoController@store')->name('contacto.submit');

    Route::get('/recetas/receta', [RecetaController::class, 'index'])->name('recetas.receta');
    // Ruta para mostrar el formulario de creación de receta
    Route::get('/recetas/create', [RecetaController::class, 'create'])->name('recetas.create');

    // Ruta para mostrar el formulario de edición de receta
    Route::get('/recetas/{id}/edit', [RecetaController::class, 'edit'])->name('recetas.edit');

    /**
     * Defino rutas para administrador agrupándolas y aplicándoles el middleware 'is_admin'
     */
    Route::middleware('is.admin')->group(function () {
        Route::get('/only_admin', function () {
            return "El administrador pude ver esto";
        });

        // Define aquí las rutas accesibles solo para administradores
        //Route::get('/admin', 'AdminController@index')->name('admin.bienvenido');
        // Route::get('/', [AdminController::class, 'bienvenido'])->name('admin.dashboard');
        /* Route::get('/admin/users', [AdminController::class, 'lista_users'])->name('admin.users.listUsers');
            Route::get('/admin/user/edit/{id}', [AdminController::class, 'editUser'])->name('admin.user.edit');
            Route::post('/admin/user/update/{id}', [AdminController::class, 'updateUser'])->name('admin.user.update');
            Route::delete('/admin/user/delete/{id}', [AdminController::class, 'deleteUser'])->name('admin.user.delete');*/
    });

    Route::middleware('is.user')->group(function () {

        Route::get('/only_user', function () {
            return "Solo el usuario normal pude ver esto";
        });
        
        // Define aquí las rutas accesibles solo para administradores
        //Route::get('/admin', 'AdminController@index')->name('admin.bienvenido');
        // Route::get('/', [AdminController::class, 'bienvenido'])->name('admin.dashboard');
        /* Route::get('/admin/users', [AdminController::class, 'lista_users'])->name('admin.users.listUsers');
            Route::get('/admin/user/edit/{id}', [AdminController::class, 'editUser'])->name('admin.user.edit');
            Route::post('/admin/user/update/{id}', [AdminController::class, 'updateUser'])->name('admin.user.update');
            Route::delete('/admin/user/delete/{id}', [AdminController::class, 'deleteUser'])->name('admin.user.delete');*/
    });
    Route::middleware(['auth', 'role:admin'])->group(function () {
        // Rutas para edición y eliminación de recetas
    });
});

require __DIR__ . '/auth.php';

