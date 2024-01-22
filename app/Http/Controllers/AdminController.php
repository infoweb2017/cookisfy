<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Categoria;
use App\Models\Comentario;
use App\Models\Evento;
use App\Models\Ingrediente;
use App\Models\Ofertas;
use App\Models\Receta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    // Método para mostrar el index del administrador
    public function index()
    {
        return view('admin.admin-dashboard');
    }

    public function listRecetas()
    {
        $recetas = Receta::all();
        return view('admin/recetas/lista', compact('recetas'));
    }
    // Otros métodos para editar, actualizar y eliminar recetas
    public function createRecetaForm()
    {
        // Puedo necesitar obtener categorías u otros datos relevantes aquí
        return view('admin.recetas.crear');
    }
    public function storeReceta(Request $request)
    {
        // Validación de datos
        $request->validate([
            // Agrega las reglas de validación necesarias aquí
        ]);

        // Crear la receta
        $receta = new Receta();
        $receta->titulo = $request->input('titulo');
        // Asigna otros campos de la receta aquí
        $receta->save();

        return redirect()->route('admin/recetas/lista')->with('success', 'Receta creada exitosamente.');
    }
    public function editRecetaForm($id)
    {
        $receta = Receta::find($id);
        $categorias = Categoria::all(); // Obtener todas las categorías
        $recetaPasos = Receta::with('pasos')->find($id);
        // Puedes necesitar obtener otras relaciones o datos relevantes aquí
        return view('admin.recetas.edit', compact('receta', 'categorias', 'recetaPasos'));
    }
    public function updateReceta(Request $request, $id)
    {
        // Validación de datos
        $request->validate([
            // Agrega las reglas de validación necesarias aquí
        ]);

        // Obtener la receta a actualizar
        $receta = Receta::find($id);
        $receta->titulo = $request->input('titulo');
        // Actualiza otros campos de la receta aquí
        $receta->save();

        return redirect()->route('admin.recetas')->with('success', 'Receta actualizada exitosamente.');
    }
    public function deleteReceta($id)
    {
        // Encuentra la receta y eliminarla
        $receta = Receta::find($id);
        $receta->delete();

        return redirect()->route('admin.recetas')->with('success', 'Receta eliminada exitosamente.');
    }

    // Método para mostrar una lista de usuarios
    public function listUsers()
    {
        // Lógica para listar usuarios en el panel de administración
        $users = User::paginate(10); // Obtener todos los usuarios con paginación de 10 usuarios por página
        return view('admin.usuarios.lista', compact('users'));
    }

    // Método muestra el formulario para crear usuarios
    public function create()
    {
        return view('admin.usuarios.crear');
    }

    // Método para almacenar los datos del nuevo usuario
    public function store(Request $request)
    {
        // Validación de datos (puedes agregar validaciones personalizadas según tus necesidades)
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|unique:users',
                'password' => 'required|string|min:8|confirmed',
                'is_admin' => 'required|boolean',
            ]);

            // Crear el nuevo usuario
            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
                'is_admin' => $request->input('is_admin'), // Asignación de is_admin
            ]);

            $isAdmin = $request->input('is_admin');

            if ($isAdmin) {
                $user->is_admin = 1;
            } else {
                $user->user = 0;
            }

            return redirect()->route('admin.usuarios')->with('success', 'Usuario creado exitosamente.');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    // Método para editar un usuario
    public function editUser($id)
    {
        $user = User::find($id); // Encuentra al usuario por ID
        // Verifica si el usuario existe
        if (!$user) {
            return redirect()->route('usuarios.lista')->with('error', 'Usuario no encontrado');
        }
        return view('admin.usuarios.edit', compact('user'));
    }

    // Método para actualizar un usuario
    public function updateUser(Request $request, $id)
    {
        // Validación de los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            // Otras reglas de validación según tus necesidades
        ]);

        // Encuentra el usuario que deseas actualizar
        $user = User::findOrFail($id);

        // Actualiza los campos del usuario con los datos del formulario
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        // Actualiza otros campos según tus necesidades

        // Guarda los cambios en la base de datos
        $user->save();

        // Redirige de vuelta a la lista de usuarios con un mensaje de éxito
        return redirect()->route('admin.usuarios')->with('success', 'Usuario actualizado correctamente');
    }

    // Método para eliminar un usuario
    public function deleteUser($id)
    {
        User::destroy($id);
        return redirect()->route('admin.usuarios')->with('success', 'Usuario eliminado correctamente');
    }
    public function buscar(Request $request)
    {
        $query = $request->input('q');

        // Buscar recetas por título, descripción
        $recetas = Receta::where('titulo', 'like', '%' . $query . '%')
            ->orWhere('descripcion', 'like', '%' . $query . '%')
            ->get();

        // Buscar usuarios por nombre y email
        $usuarios = User::where('name', 'like', '%' . $query . '%')
            ->orWhere('email', 'like', '%' . $query . '%')
            ->get();

        return view('admin.resultado_busqueda', compact('recetas', 'usuarios'));
    }

    //Método para obtener el total de usuarios registrados, recetas y comentarios
    public function contador()
    {
        $totalUsuarios = User::count();
        $totalRecetas = Receta::count();
        $totalComentarios = Comentario::count();
        $totalArticulos = Articulo::count();
        $totalEventos = Evento::count();
        $totalOfertas = Ofertas::count();
        $totalCategoria = Categoria::count();
        $totalIngrediente = Ingrediente::count();

        return view('admin.admin-dashboard', compact(
            'totalUsuarios',
            'totalRecetas',
            'totalComentarios',
            'totalArticulos',
            'totalEventos',
            'totalOfertas',
            'totalCategoria',
            'totalIngrediente'
        ));
    }

    //Pendiente de poder terminarlo OJO
    public function obtenerDatosParaGrafico()
    {
        $datos = [
            'articulos' => Articulo::all(),
            'eventos' => Evento::all(),
            'categorias' => Categoria::all(),
            'ingredientes' => Ingrediente::all(),
            'usuarios' => User::all(),
            'recetas' => Receta::all(),
            'ofertas' => Ofertas::all(),
        ];

        return response()->json($datos); // Devuelve los datos en formato JSON
    }

    
}
