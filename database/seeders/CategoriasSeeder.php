<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriasSeeder extends Seeder
{
    public function run(): void
    {
        $categorias = [
            //Ingredientes
            ['nombre' => 'Legumbres', 'descripcion' => 'Categoría de legumbres'],
            ['nombre' => 'Pescados y Mariscos', 'descripcion' => 'Categoría de pescados y mariscos'],
            ['nombre' => 'Carnes y Aves', 'descripcion' => 'Categoría de carnes y aves'],
            ['nombre' => 'Frutas', 'descripcion' => 'Categoría de frutas'],
            ['nombre' => 'Endulzantes', 'descripcion' => 'Categoría de endulzantes'],
            ['nombre' => 'Lácteos y Huevos', 'descripcion' => 'Categoría de lácteos y huevos'],
            ['nombre' => 'Cereales y Granos', 'descripcion' => 'Categoría de cereales y granos'],
            ['nombre' => 'Frutos Secos y Semillas', 'descripcion' => 'Categoría de frutos secos y semillas'],
            ['nombre' => 'Aceites y Grasas', 'descripcion' => 'Categoría de aceites y grasas'],
            ['nombre' => 'Especias y Hierbas', 'descripcion' => 'Categoría de especias y hierbas'],
            ['nombre' => 'Salsas y Condimentos', 'descripcion' => 'Categoría de salsas y condimentos'],
            ['nombre' => 'Bebidas y Líquidos', 'descripcion' => 'Categoría de bebidas y líquidos'],
            ['nombre' => 'Verduras y Hortalizas', 'descripcion' => 'Categoría de verduras y hortalizas'],
            ['nombre' => 'Productos Fermentados', 'descripcion' => 'Categoría de productos fermentados'],
            ['nombre' => 'Alimentos a Base de Soja', 'descripcion' => 'Categoría de alimentos a base de soja'],
            ['nombre' => 'Sustitutos de Carne y Productos Veganos', 'descripcion' => 'Categoría productos Veganos'],
            ['nombre' => 'Conservas y Alimentos en Lata', 'descripcion' => 'Categoría de conservas y alimentos en lata'],
            ['nombre' => 'Productos Deshidratados o Liofilizados', 'descripcion' => 'Categoría de productos deshidratados o liofilizados'],
            ['nombre' => 'Aderezos y Vinagres', 'descripcion' => 'Categoría de aderezos y vinagres'],
            ['nombre' => 'Alimentos Integrales', 'descripcion' => 'Categoría de alimentos integrales'],
            ['nombre' => 'Suplementos y Polvos', 'descripcion' => 'Categoría de suplementos y polvos'],
            ['nombre' => 'Alimentos Orgánicos y de Origen Local', 'descripcion' => 'Categoría de alimentos orgánicos y de origen local'],
            ['nombre' => 'Especias y Condimentos Étnicos', 'descripcion' => 'Categoría de especias y condimentos étnicos'],
            ['nombre' => 'Bebidas Alcohólicas y No Alcohólicas para Cocinar', 'descripcion' => 'Categoría de bebidas alcohólicas y no alcohólicas para cocinar'],
            ['nombre' => 'Sustitutos del Azúcar y Harina', 'descripcion' => 'Categoría de sustitutos del azúcar y harina'],
            ['nombre' => 'Alimentos Sin Gluten', 'descripcion' => 'Categoría de alimentos sin gluten'],
            ['nombre' => 'Alimentos Bajos en Carbohidratos o Keto', 'descripcion' => 'Categoría de alimentos bajos en carbohidratos o keto'],
            //Categorias para las recetas
            ['nombre' => 'Desayuno', 'descripcion' => 'Categoría de desayuno', 'categoria_tipo' => 'receta'],
            ['nombre' => 'Brunch', 'descripcion' => 'Categoría de brunch', 'categoria_tipo' => 'receta'],
            ['nombre' => 'Almuerzo', 'descripcion' => 'Categoría de almuerzo', 'categoria_tipo' => 'receta'],
            ['nombre' => 'Comida', 'descripcion' => 'Categoría de comida', 'categoria_tipo' => 'receta'],
            ['nombre' => 'Merienda', 'descripcion' => 'Categoría de merienda', 'categoria_tipo' => 'receta'],
            ['nombre' => 'Cena', 'descripcion' => 'Categoría de cenas', 'categoria_tipo' => 'receta'],
            ['nombre' => 'Tapas y Pinchos', 'descripcion' => 'Categoría de tapas y pinchos', 'categoria_tipo' => 'receta'],
            ['nombre' => 'Guisos y Cocidos', 'descripcion' => 'Categoría de guisos y cocidos', 'categoria_tipo' => 'receta'],
            ['nombre' => 'Mariscos', 'descripcion' => 'Categoría de mariscos', 'categoria_tipo' => 'receta'],
            ['nombre' => 'Carnes', 'descripcion' => 'Categoría de carnes', 'categoria_tipo' => 'receta'],
            ['nombre' => 'Quesos y Embutidos', 'descripcion' => 'Categoría de quesos y embutidos', 'categoria_tipo' => 'receta'],
            ['nombre' => 'Bebidas Tradicionales', 'descripcion' => 'Categoría de bebidas tradicionales', 'categoria_tipo' => 'receta'],
            ['nombre' => 'Sopas y Cremas', 'descripcion' => 'Categoría de sopas y cremas', 'categoria_tipo' => 'receta'],
            ['nombre' => 'Vegetariano y Vegano', 'descripcion' => 'Categoría de vegetariano y vegano', 'categoria_tipo' => 'receta'],
            ['nombre' => 'Pastas ', 'descripcion' => 'Categoría de pastas', 'categoria_tipo' => 'receta'],
            ['nombre' => 'Arroces', 'descripcion' => 'Categoría de arroces', 'categoria_tipo' => 'receta'],
            ['nombre' => 'Guarniciones', 'descripcion' => 'Categoría de guarniciones', 'categoria_tipo' => 'receta'],
            ['nombre' => 'Postres', 'descripcion' => 'Categoría de postres', 'categoria_tipo' => 'receta'],
            ['nombre' => 'Panadería ', 'descripcion' => 'Categoría de panadería', 'categoria_tipo' => 'receta'],
            ['nombre' => 'Bollería', 'descripcion' => 'Categoría de bollería', 'categoria_tipo' => 'receta'],
            ['nombre' => 'Conservas y Salsas', 'descripcion' => 'Categoría de conservas y salsas', 'categoria_tipo' => 'receta'],
            ['nombre' => 'Mediterránea', 'descripcion' => 'Categoría de mediterránea', 'categoria_tipo' => 'receta'],
            ['nombre' => 'Comida Internacional', 'descripcion' => 'Categoría de comida internacional', 'categoria_tipo' => 'receta'],
            ['nombre' => 'Comida Saludable ', 'descripcion' => 'Categoría de comida saludable', 'categoria_tipo' => 'receta'],
            ['nombre' => 'Alta Cocina', 'descripcion' => 'Categoría de alta cocina', 'categoria_tipo' => 'receta'],
            ['nombre' => 'Comida de Temporada ', 'descripcion' => 'Categoría de comida de temporada', 'categoria_tipo' => 'receta'],
            ['nombre' => 'Comida Festiva', 'descripcion' => 'Categoría de comida festiva', 'categoria_tipo' => 'receta'],
            ['nombre' => 'Recetas para Niños', 'descripcion' => 'Categoría de recetas para niños', 'categoria_tipo' => 'receta'],
            ['nombre' => 'Cocina de Autor', 'descripcion' => 'Categoría de cocina de autor', 'categoria_tipo' => 'receta'],
            ['nombre' => 'Cocina Fusión', 'descripcion' => 'Categoría de cocina fusión', 'categoria_tipo' => 'receta'],
            ['nombre' => 'Comidas Regionales o Locales', 'descripcion' => 'Categoría de comidas regionales o locales', 'categoria_tipo' => 'receta'],
            ['nombre' => 'Cocina Sostenible y Ecológica', 'descripcion' => 'Categoría de cocina sostenible y ecológica', 'categoria_tipo' => 'receta'],
            ['nombre' => 'Platos para Dietas Específicas', 'descripcion' => 'Categoría de platos para dietas específicas', 'categoria_tipo' => 'receta'],
            ['nombre' => 'Comida Callejera', 'descripcion' => 'Categoría de comida callejera', 'categoria_tipo' => 'receta'],
        ];

        foreach ($categorias as $categoria) {
            // Verifica si el ingrediente o la categoria de receta ya existe en la base de datos
            $existente = Categoria::where('nombre', $categoria['nombre'])->first();

            if (!$existente) {
                // Crea una nueva categoría en la base de datos
                Categoria::create($categoria);
            }
        }
    }
}
