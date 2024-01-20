<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\BuscarController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\CookieController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\GaleriaController;
use App\Http\Controllers\OfertasController;
use App\Http\Controllers\PlatoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IngredientesController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\PoliticaController;
use App\Http\Controllers\RecetaController;
use App\Http\Controllers\SobrenosotrosController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\WelcomeController;
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

/** Defino rutas para todos*/
//Route::get('/welcome/{mostrarRecetas?}', [InicioController::class, 'inicio'])->name('inicio');
//Auth::routes();

//Route::get('/welcome', [RecetaController::class, 'mostrarRecetasPublica'])->
Route::get('/', [RecetaController::class, 'mostrarRecetasYArticulos']);
Route::get('/welcome', [RecetaController::class, 'mostrarRecetasYArticulos'])->name('page_welcome');
Route::get('/galeria_img_platos', [GaleriaController::class, 'fotos_platos'])->name('fotos');
Route::get('/busquedas/buscar', [BuscarController::class, 'buscar'])->name('busquedas.buscar');
//Route::get('/busquedas/buscarAvanzada', [RecetaController::class, 'busquedaAvanzada'])->name('busquedaAvanzada');
Route::get('/sobre-nosotros', [SobrenosotrosController::class, 'index'])->name('sobrenosotros');
//Route::get('/welcome', [ArticuloController::class, 'index'])->name('articulos');
Route::get('/contacto/form-contacto', [ContactoController::class, 'index'])->name('contacto');
Route::get('/contacto/contacto_confirm', [ContactoController::class, 'contacto_confirm'])->name('contacto.contacto_confirm');
Route::get('/consulta/ver/{id}', [ContactoController::class, 'show'])->name('consulta');
Route::post('/contacto/store', [ContactoController::class, 'store'])->name('contacto.store');
Route::get('/politica/privacidad', [PoliticaController::class, 'privacidad'])->name('privacidad');
Route::get('/politica/cookies', [PoliticaController::class, 'cookies'])->name('cookies');
Route::get('/banner/saber-mas', [RecetaController::class, 'saberMas'])->name('saberMas');
Route::post('/subscribe', [SubscriberController::class, 'subscribe'])->name('subscribe');
Route::get('/galeria', [GaleriaController::class, 'galerias'])->name('galeria');
Route::get('/faq', [FAQController::class, 'faq'])->name('faq');
Route::get('/set-cookie', [CookieController::class, 'setCookie']);
Route::get('/get-cookie', [CookieController::class, 'getCookie']);


Route::post('/cookie-consent', function (Illuminate\Http\Request $request) {
    if ($request->input('consent')) {
        // Se aceptan las cookies
        session(['cookies_aceptadas' => true]);
    } else {
        // Lógica para cancelar las cookies, no hay una acción específica para realizar
    }
    return response()->json(['message' => 'Actualización del consentimiento de cookies']);
});

/** Defino rutas para usuarios registrados*/
Route::middleware('auth')->group(function () {
    // Rutas de inicio y cierre de sesión
    Route::get('index', [HomeController::class, 'index'])->name('index'); //Le paso ofertas y eventos
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout'); //Cerrar sesión

    // Rutas de perfil
    Route::get('/perfil/editar', [ProfileController::class, 'editar'])->name('perfil.editar');
    Route::patch('/perfil/partials', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/perfil/partials', [ProfileController::class, 'destroy'])->name('profile.destroy'); //Elimina la cuenta del usuario

    // Rutas de comentarios y calificaciones
    Route::get('/recetas/{receta}/comentarios/create', [ComentarioController::class,'create'])->name('comentarios.create');
    Route::post('/recetas/{recetaId}/comentarios', [ComentarioController::class, 'store'])->name('comentarios.store');
    Route::get('comentarios/{comentario}/edit', [ComentarioController::class, 'edit'])->name('comentarios.edit');
    Route::put('comentarios/{comentario}', [ComentarioController::class, 'update'])->name('comentarios.update');
    Route::delete('comentarios/{comentario}', [ComentarioController::class, 'destroy'])->name('comentarios.destroy');
    
    // Rutas de  calificaciones(reseñas)
    Route::post('/recetas/{receta}/calificaciones', [RecetaController::class, 'store'])->name('calificaciones.store');

    // Rutas de ingredientes
    Route::post('/ingredientes', [IngredientesController::class, 'store']);
    Route::get('/ingrediente/{nombre}', [IngredientesController::class, 'buscar']);

    // Rutas de recetas
    Route::get('/recetas/inicio', [RecetaController::class, 'inicio'])->name('recetas.inicio');
    Route::post('/recetas/', [RecetaController::class, 'store'])->name('recetas.store');
    Route::get('/recetas', [RecetaController::class, 'create'])->name('recetas.create');
    Route::get('/recetas/{receta}', [RecetaController::class, 'show'])->name('recetas.show');
    Route::get('/recetas/{receta}/edit', [RecetaController::class, 'edit'])->name('recetas.edit');
    Route::delete('/recetas/{receta}', [RecetaController::class, 'destroy'])->name('recetas.destroy');
    Route::put('/recetas/{receta}', [RecetaController::class, 'update'])->name('recetas.update');

    // Ruta de la galería
    Route::get('/galeria', [RecetaController::class, 'galeria'])->name('recetas.galeria');
    /**
     * Defino rutas para administrador agrupándolas y aplicándoles el middleware 'admin'
     */
    Route::middleware('admin')->group(function () {
        // Define aquí las rutas accesibles solo para administradores
        Route::get('/admin/admin-dashboard', [AdminController::class, 'index'])->name('admin.admin-dashboard');

        //Ruta editar peril del usuario administrador desde Navbar
        Route::get('/admin/perfil/editar', [ProfileController::class, 'editar'])->name('admin.editar');

        // Rutas de usuarios (administrador)
        Route::get('/admin/usuarios', [AdminController::class, 'listUsers'])->name('admin.usuarios');
        Route::get('/admin/usuarios/create', [AdminController::class, 'create'])->name('admin.usuarios.create');
        Route::post('/admin/usuarios',  [AdminController::class, 'store'])->name('admin.usuarios.store');
        Route::get('/admin/usuarios/{id}/edit', [AdminController::class, 'editUser'])->name('admin.usuarios.edit');
        Route::put('/admin/usuarios/{id}', [AdminController::class, 'updateUser'])->name('admin.usuarios.update');
        Route::delete('/admin/usuarios/{id}', [AdminController::class, 'deleteUser'])->name('admin.usuarios.delete');

        //Ruta busqueda recetas y usuarios
        Route::get('/admin/busqueda', [AdminController::class, 'buscar'])->name('admin.resultados');

        // Rutas de recetas (administrador)
        Route::get('/admin/recetas', [AdminController::class, 'listRecetas'])->name('admin.recetas');
        Route::get('/admin/recetas/create', [AdminController::class, 'createRecetaForm'])->name('admin.recetas.create');
        Route::post('/admin/recetas', [AdminController::class, 'storeReceta'])->name('admin.recetas.store');
        Route::get('/admin/recetas/{id}/edit', [AdminController::class, 'editRecetaForm'])->name('admin.recetas.edit');
        Route::put('/admin/recetas/{id}', [AdminController::class, 'updateReceta'])->name('admin.recetas.update');
        Route::delete('/admin/recetas/{id}', [AdminController::class, 'deleteReceta'])->name('admin.recetas.delete');

        // Rutas de categorias (administrador)
        Route::get('/admin/categorias', [CategoriaController::class, 'listCategoria'])->name('admin.categorias');
        Route::get('/admin/categorias/create', [CategoriaController::class, 'create'])->name('admin.categorias.create');
        Route::post('/admin/categorias', [CategoriaController::class, 'store'])->name('admin.categorias.store');
        Route::get('/admin/categorias/{categoria}/edit', [CategoriaController::class, 'edit'])->name('admin.categorias.edit');
        Route::put('/admin/categorias/{categoria}', [CategoriaController::class, 'update'])->name('admin.categorias.update');
        Route::delete('/admin/categorias/{categoria}', [CategoriaController::class, 'delete'])->name('admin.categorias.delete');

        // Rutas de ingredientes (administrador)
        Route::get('/admin/ingredientes', [IngredientesController::class, 'listIngredientes'])->name('admin.ingredientes');
        Route::get('/admin/ingredientes/create', [IngredientesController::class, 'create'])->name('admin.ingredientes.create');
        Route::post('/admin/ingredientes', [IngredientesController::class, 'store'])->name('admin.ingredientes.store');
        Route::get('/admin/ingredientes/{ingrediente}/edit', [IngredientesController::class, 'edit'])->name('admin.ingredientes.edit');
        Route::put('/admin/ingredientes/{ingrediente}', [IngredientesController::class, 'update'])->name('admin.ingredientes.update');
        Route::delete('/admin/ingredientes/{ingrediente}', [IngredientesController::class, 'delete'])->name('admin.ingredientes.delete');

        //Rutas Articulos (administrador)
        Route::get('/admin/articulos', [ArticuloController::class, 'listArticulos'])->name('admin.articulos');
        Route::get('/admin/articulos/create', [ArticuloController::class, 'create'])->name('admin.articulos.create');
        Route::post('/admin/articulos', [ArticuloController::class, 'store'])->name('admin.articulos.store');
        Route::get('/admin/articulos/{articulo}/edit', [ArticuloController::class, 'edit'])->name('admin.articulos.edit');
        Route::put('/admin/articulos/{articulo}', [ArticuloController::class, 'update'])->name('admin.articulos.update');
        Route::delete('/admin/articulos/{articulo}', [ArticuloController::class, 'delete'])->name('admin.articulos.delete');

        //Rutas Eventos (administrador)
        Route::get('/admin/eventos', [EventoController::class, 'listEventos'])->name('admin.eventos');
        Route::get('/admin/eventos/create', [EventoController::class, 'create'])->name('admin.eventos.create');
        Route::post('/admin/eventos', [EventoController::class, 'store'])->name('admin.eventos.store');
        Route::get('/admin/eventos/{evento}/edit', [EventoController::class, 'edit'])->name('admin.eventos.edit');
        Route::put('/admin/eventos/{evento}', [EventoController::class, 'update'])->name('admin.eventos.update');
        Route::delete('/admin/eventos/{evento}', [EventoController::class, 'delete'])->name('admin.eventos.delete');

        //Route::get('/index', [OfertasController::class, 'mostrarRecetasYArticulos']);

        //Rutas Ofertas (administrador)
        Route::get('/admin/ofertas', [OfertasController::class, 'listOfertas'])->name('admin.ofertas');
        Route::get('/admin/ofertas/create', [OfertasController::class, 'create'])->name('admin.ofertas.create');
        Route::post('/admin/ofertas', [OfertasController::class, 'store'])->name('admin.ofertas.store');
        Route::get('/admin/ofertas/{oferta}/edit', [OfertasController::class, 'edit'])->name('admin.ofertas.edit');
        Route::put('/admin/ofertas/{oferta}', [OfertasController::class, 'update'])->name('admin.ofertas.update');
        Route::delete('/admin/ofertas/{oferta}', [OfertasController::class, 'delete'])->name('admin.ofertas.delete');

        //Ruta contador
        Route::get('/admin/admin-dashboard', [AdminController::class, 'contador'])->name('admin.admin-dashboard');
    });
});

require __DIR__ . '/auth.php';
