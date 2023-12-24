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
            ['nombre' => 'Legumbres', 'descripción' => 'Categoría de legumbres'],
            ['nombre' => 'Pescados y Mariscos', 'descripción' => 'Categoría de pescados y mariscos'],
            ['nombre' => 'Carnes y Aves', 'descripción' => 'Categoría de carnes y aves'],
            ['nombre' => 'Frutas', 'descripción' => 'Categoría de frutas'],
            ['nombre' => 'Endulzantes', 'descripción' => 'Categoría de endulzantes'],
            ['nombre' => 'Lácteos y Huevos', 'descripción' => 'Categoría de lácteos y huevos'],
            ['nombre' => 'Cereales y Granos', 'descripción' => 'Categoría de cereales y granos'],
            ['nombre' => 'Frutos Secos y Semillas', 'descripción' => 'Categoría de frutos secos y semillas'],
            ['nombre' => 'Aceites y Grasas', 'descripción' => 'Categoría de aceites y grasas'],
            ['nombre' => 'Especias y Hierbas', 'descripción' => 'Categoría de especias y hierbas'],
            ['nombre' => 'Salsas y Condimentos', 'descripción' => 'Categoría de salsas y condimentos'],
            ['nombre' => 'Bebidas y Líquidos', 'descripción' => 'Categoría de bebidas y líquidos'],
            ['nombre' => 'Verduras y Hortalizas', 'descripción' => 'Categoría de verduras y hortalizas'],
            ['nombre' => 'Productos Fermentados', 'descripción' => 'Categoría de productos fermentados'],
            ['nombre' => 'Alimentos a Base de Soja', 'descripción' => 'Categoría de alimentos a base de soja'],
            ['nombre' => 'Sustitutos de Carne y Productos Veganos', 'descripción' => 'Categoría productos Veganos'],
            ['nombre' => 'Conservas y Alimentos en Lata', 'descripción' => 'Categoría de conservas y alimentos en lata'],
            ['nombre' => 'Productos Deshidratados o Liofilizados', 'descripción' => 'Categoría de productos deshidratados o liofilizados'],
            ['nombre' => 'Aderezos y Vinagres', 'descripción' => 'Categoría de aderezos y vinagres'],
            ['nombre' => 'Alimentos Integrales', 'descripción' => 'Categoría de alimentos integrales'],
            ['nombre' => 'Suplementos y Polvos', 'descripción' => 'Categoría de suplementos y polvos'],
            ['nombre' => 'Alimentos Orgánicos y de Origen Local', 'descripción' => 'Categoría de alimentos orgánicos y de origen local'],
            ['nombre' => 'Especias y Condimentos Étnicos', 'descripción' => 'Categoría de especias y condimentos étnicos'],
            ['nombre' => 'Bebidas Alcohólicas y No Alcohólicas para Cocinar', 'descripción' => 'Categoría de bebidas alcohólicas y no alcohólicas para cocinar'],
            ['nombre' => 'Sustitutos del Azúcar y Harina', 'descripción' => 'Categoría de sustitutos del azúcar y harina'],
            ['nombre' => 'Alimentos Sin Gluten', 'descripción' => 'Categoría de alimentos sin gluten'],
            ['nombre' => 'Alimentos Bajos en Carbohidratos o Keto', 'descripción' => 'Categoría de alimentos bajos en carbohidratos o keto'],
            //Categorias para las recetas
            ['nombre' => 'Desayuno', 'descripción' => 'Categoría de desayuno', 'categoria_tipo' => 'receta'],
            ['nombre' => 'Brunch', 'descripción' => 'Categoría de brunch', 'categoria_tipo' => 'receta'],
            ['nombre' => 'Almuerzo', 'descripción' => 'Categoría de almuerzo', 'categoria_tipo' => 'receta'],
            ['nombre' => 'Comida', 'descripción' => 'Categoría de comida', 'categoria_tipo' => 'receta'],
            ['nombre' => 'Merienda', 'descripción' => 'Categoría de merienda', 'categoria_tipo' => 'receta'],
            ['nombre' => 'Cena', 'descripción' => 'Categoría de cenas', 'categoria_tipo' => 'receta'],
            ['nombre' => 'Tapas y Pinchos', 'descripción' => 'Categoría de tapas y pinchos', 'categoria_tipo' => 'receta'],
            ['nombre' => 'Guisos y Cocidos', 'descripción' => 'Categoría de guisos y cocidos', 'categoria_tipo' => 'receta'],
            ['nombre' => 'Mariscos', 'descripción' => 'Categoría de mariscos', 'categoria_tipo' => 'receta'],
            ['nombre' => 'Carnes', 'descripción' => 'Categoría de carnes', 'categoria_tipo' => 'receta'],
            ['nombre' => 'Quesos y Embutidos', 'descripción' => 'Categoría de quesos y embutidos', 'categoria_tipo' => 'receta'],
            ['nombre' => 'Bebidas Tradicionales', 'descripción' => 'Categoría de bebidas tradicionales', 'categoria_tipo' => 'receta'],
            ['nombre' => 'Sopas y Cremas', 'descripción' => 'Categoría de sopas y cremas', 'categoria_tipo' => 'receta'],
            ['nombre' => 'Vegetariano y Vegano', 'descripción' => 'Categoría de vegetariano y vegano', 'categoria_tipo' => 'receta'],
            ['nombre' => 'Pastas ', 'descripción' => 'Categoría de pastas', 'categoria_tipo' => 'receta'],
            ['nombre' => 'Arroces', 'descripción' => 'Categoría de arroces', 'categoria_tipo' => 'receta'],
            ['nombre' => 'Guarniciones', 'descripción' => 'Categoría de guarniciones', 'categoria_tipo' => 'receta'],
            ['nombre' => 'Postres', 'descripción' => 'Categoría de postres', 'categoria_tipo' => 'receta'],
            ['nombre' => 'Panadería ', 'descripción' => 'Categoría de panadería', 'categoria_tipo' => 'receta'],
            ['nombre' => 'Bollería', 'descripción' => 'Categoría de bollería', 'categoria_tipo' => 'receta'],
            ['nombre' => 'Conservas y Salsas', 'descripción' => 'Categoría de conservas y salsas', 'categoria_tipo' => 'receta'],
            ['nombre' => 'Mediterránea', 'descripción' => 'Categoría de mediterránea', 'categoria_tipo' => 'receta'],
            ['nombre' => 'Comida Internacional', 'descripción' => 'Categoría de comida internacional', 'categoria_tipo' => 'receta'],
            ['nombre' => 'Comida Saludable ', 'descripción' => 'Categoría de comida saludable', 'categoria_tipo' => 'receta'],
            ['nombre' => 'Alta Cocina', 'descripción' => 'Categoría de alta cocina', 'categoria_tipo' => 'receta'],
            ['nombre' => 'Comida de Temporada ', 'descripción' => 'Categoría de comida de temporada', 'categoria_tipo' => 'receta'],
            ['nombre' => 'Comida Festiva', 'descripción' => 'Categoría de comida festiva', 'categoria_tipo' => 'receta'],
            ['nombre' => 'Recetas para Niños', 'descripción' => 'Categoría de recetas para niños', 'categoria_tipo' => 'receta'],
            ['nombre' => 'Cocina de Autor', 'descripción' => 'Categoría de cocina de autor', 'categoria_tipo' => 'receta'],
            ['nombre' => 'Cocina Fusión', 'descripción' => 'Categoría de cocina fusión', 'categoria_tipo' => 'receta'],
            ['nombre' => 'Comidas Regionales o Locales', 'descripción' => 'Categoría de comidas regionales o locales', 'categoria_tipo' => 'receta'],
            ['nombre' => 'Cocina Sostenible y Ecológica', 'descripción' => 'Categoría de cocina sostenible y ecológica', 'categoria_tipo' => 'receta'],
            ['nombre' => 'Platos para Dietas Específicas', 'descripción' => 'Categoría de platos para dietas específicas', 'categoria_tipo' => 'receta'],
            ['nombre' => 'Comida Callejera', 'descripción' => 'Categoría de comida callejera', 'categoria_tipo' => 'receta'],
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
