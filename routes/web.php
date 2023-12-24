<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IngredientesController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\PoliticaController;
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
    return view('welcome');
});
Route::get('/welcome', [InicioController::class, 'inicio'])->name('inicio');

Auth::routes();
Route::get('/recetas/galeria', [RecetaController::class, 'galeria'])->name('recetas.galeria');
Route::get('/busquedas/buscar', [RecetaController::class, 'buscar'])->name('busquedas.buscar');
Route::get('/busquedas/buscarAvanzada', [RecetaController::class, 'busquedaAvanzada'])->name('busquedaAvanzada');
Route::get('/sobre-nosotros', [SobrenosotrosController::class, 'index'])->name('sobrenosotros');
Route::get('/contacto/contacto', [ContactoController::class, 'index'])->name('contacto');
Route::get('/contacto/contacto_confirm', [ContactoController::class, 'contacto_confirm'])->name('contacto.contacto_confirm');
Route::get('/ver/consulta/{id}', [ContactoController::class, 'show'])->name('ver.consulta');
Route::post('/contacto/store', [ContactoController::class, 'store'])->name('contacto.store');
Route::get('/politica/privacidad', [PoliticaController::class, 'privacidad'])->name('privacidad');
Route::get('/politica/cookies', [PoliticaController::class, 'cookies'])->name('cookies');
Route::get('/banner/saber-mas', [RecetaController::class, 'saberMas'])->name('saberMas');


Route::middleware('auth')->group(function () {
    Route::get('index', [HomeController::class, 'index'])->name('index');
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout'); //Cerrar sesión

    Route::get('/perfil/editar', [ProfileController::class, 'editar'])->name('perfil.editar');
    Route::patch('/perfil/partials', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/perfil/partials', [ProfileController::class, 'destroy'])->name('profile.destroy'); //Elimina la cuenta del usuario

    // Ruta para mostrar el formulario de creación de comentarios
    Route::get('/recetas/{receta}/comentarios/create', 'ComentarioController@create')->name('comentarios.create');
    // Ruta para almacenar el comentario en la base de datos
    Route::post('/recetas/{receta}/comentarios', [ComentarioController::class, 'store'])->name('comentarios.store');

    Route::post('/recetas/{receta}/calificaciones', [RecetaController::class, 'store'])->name('calificaciones.store');
    Route::post('/ingredientes/guardar', [IngredientesController::class, 'store']);

    //Route::resource('recetas', RecetaController::class); // Ruta para definir múltiples acciones en un controlador de recursos
    Route::get('/recetas', [RecetaController::class, 'index'])->name('recetas.index');
    Route::post('/recetas', [RecetaController::class, 'store'])->name('recetas.store');
    Route::get('/recetas/create', [RecetaController::class, 'create'])->name('recetas.create');
    Route::get('/recetas/{receta}', [RecetaController::class, 'show'])->name('recetas.show');
    Route::get('/recetas/{receta}/edit', [RecetaController::class, 'edit'])->name('recetas.edit');
    Route::delete('/recetas/{receta}', [RecetaController::class, 'destroy'])->name('recetas.destroy');

    Route::get('/recetas/galeria', [RecetaController::class, 'galeria'])->name('recetas.galeria');

    /**
     * Defino rutas para administrador agrupándolas y aplicándoles el middleware 'admin'
     */

    Route::middleware('admin')->group(function () {

        // Define aquí las rutas accesibles solo para administradores
        Route::get('/admin/admin-dashboard', [AdminController::class, 'index'])->name('admin.admin-dashboard');
        //Route::get('/', [AdminController::class, 'bienvenido'])->name('admin.dashboard');
        Route::get('/admin/users', [AdminController::class, 'lista_users'])->name('admin.users.listUsers');
        Route::get('/admin/user/edit/{id}', [AdminController::class, 'editUser'])->name('admin.user.edit');
        Route::post('/admin/user/update/{id}', [AdminController::class, 'updateUser'])->name('admin.user.update');
        Route::delete('/admin/user/delete/{id}', [AdminController::class, 'deleteUser'])->name('admin.user.delete');
    });
});

require __DIR__ . '/auth.php';
