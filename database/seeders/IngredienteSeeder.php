<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ingrediente;

class IngredienteSeeder extends Seeder
{
    public function run(): void
    {
        // Seeder para la tabla de ingredientes

        $ingredientes = [
            // ------------------ LEGUMBRES ---------------------------------------------
            ['nombre' => 'Lentejas', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 1],
            ['nombre' => 'Lentejas', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 1],
            ['nombre' => 'Judías o frijoles', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 1],
            ['nombre' => 'Guisantes o chícharos', 'cantidad_ingredientes' => '1',  'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 1],
            ['nombre' => 'Soja', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 1],
            ['nombre' => 'Frijoles mungo', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 1],
            ['nombre' => 'Frijoles adzuki', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 1],
            ['nombre' => 'Frijoles negros', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 1],
            ['nombre' => 'Frijoles canarios', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 1],
            ['nombre' => 'Frijoles de lima o habas', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 1],
            ['nombre' => 'Garrafón', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 1],

            // ------------------ PESCADOS Y MARISCOS ---------------------------------------------
            ['nombre' => 'Salmón', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ud', 'categoria_id' => 2],
            ['nombre' => 'Atún', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ud', 'categoria_id' => 2],
            ['nombre' => 'Merluza', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ud', 'categoria_id' => 2],
            ['nombre' => 'Bacalao', 'cantidad_ingredientes' => '1',  'opcional' => 0, 'unidad' => 'ud', 'categoria_id' => 2],
            ['nombre' => 'Trucha', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ud', 'categoria_id' => 2],
            ['nombre' => 'Dorada', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ud', 'categoria_id' => 2],
            ['nombre' => 'Lubina', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ud', 'categoria_id' => 2],
            ['nombre' => 'Caballa', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ud', 'categoria_id' => 2],
            ['nombre' => 'Pargo', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ud', 'categoria_id' => 2],
            ['nombre' => 'Camarones', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 2],
            ['nombre' => 'Langostas', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 2],
            ['nombre' => 'Cangrejos', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ud', 'categoria_id' => 2],
            ['nombre' => 'Mejillones', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 2],
            ['nombre' => 'Ostras', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 2],
            ['nombre' => 'Calamares', 'cantidad_ingredientes' => '1',  'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 2],
            ['nombre' => 'Almejas', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 2],
            ['nombre' => 'Pulpo', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 2],
            ['nombre' => 'Cigalas', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 2],
            ['nombre' => 'Vieiras', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 2],

            // ------------------ CARNES Y AVES ---------------------------------------------
            ['nombre' => 'Res', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 3],
            ['nombre' => 'Cerdo', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 3],
            ['nombre' => 'Cordero', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 3],
            ['nombre' => 'Ternera', 'cantidad_ingredientes' => '1',  'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 3],
            ['nombre' => 'Conejo', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 3],
            ['nombre' => 'Caballo', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 3],
            ['nombre' => 'Pollo', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 3],
            ['nombre' => 'Pavo', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 3],
            ['nombre' => 'Pato', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 3],
            ['nombre' => 'Ganso', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 3],
            ['nombre' => 'Codorniz', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 3],

            // ------------------ FRUTAS ---------------------------------------------
            ['nombre' => 'Manzanas', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 4],
            ['nombre' => 'Plátanos ', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 4],
            ['nombre' => 'Naranjas', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 4],
            ['nombre' => 'Fresas', 'cantidad_ingredientes' => '1',  'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 4],
            ['nombre' => 'Uvas', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 4],
            ['nombre' => 'Kiwi', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 4],
            ['nombre' => 'Mangos', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 4],
            ['nombre' => 'Pera', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 4],
            ['nombre' => 'Cerezas', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 4],
            ['nombre' => 'Pomelo', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 4],
            ['nombre' => 'Sandía', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 4],
            ['nombre' => 'Melón', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 4],
            ['nombre' => 'Piña', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 4],
            ['nombre' => 'Cerezas', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 4],
            ['nombre' => 'Frutas exóticas', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 4],

            // ------------------ ENDULZANTES ---------------------------------------------
            ['nombre' => 'Azúcar de caña', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 5],
            ['nombre' => 'Azúcar moreno ', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 5],
            ['nombre' => 'Miel', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 5],
            ['nombre' => 'Jarabe de arce', 'cantidad_ingredientes' => '1',  'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 5],
            ['nombre' => 'Stevia', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 5],
            ['nombre' => 'Sucralosa', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 5],
            ['nombre' => 'Agave', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 5],
            ['nombre' => 'Eritritol', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 5],
            ['nombre' => 'Maltitol', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 5],
            ['nombre' => 'Sacarina', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 5],
            ['nombre' => 'Aspartame', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 5],

            // ------------------ LÁCTEOS Y HUEVOS ---------------------------------------------
            ['nombre' => 'Leche', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 6],
            ['nombre' => 'Yogur', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 6],
            ['nombre' => 'Queso', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 6],
            ['nombre' => 'Crema', 'cantidad_ingredientes' => '1',  'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 6],
            ['nombre' => 'Mantequilla', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 6],
            ['nombre' => 'Huevos enteros', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ud', 'categoria_id' => 6],
            ['nombre' => 'Claras de huevo', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'tazas', 'categoria_id' => 6],
            ['nombre' => 'Yemas de huevo', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ud', 'categoria_id' => 6],


            // ------------------ Cereales y Granos ---------------------------------------------
            ['nombre' => 'Arroz', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 7],
            ['nombre' => 'Trigo', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 7],
            ['nombre' => 'Avena', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 7],
            ['nombre' => 'Maíz', 'cantidad_ingredientes' => '1',  'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 7],
            ['nombre' => 'Quinoa', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 7],
            ['nombre' => 'Cebada', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 7],
            ['nombre' => 'Cous cous', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 7],
            ['nombre' => 'Centeno', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 7],
            ['nombre' => 'Cereales de desayuno', 'cantidad_ingredientes' => '1',  'opcional' => 0,'unidad' => 'g', 'categoria_id' => 7],
            ['nombre' => 'Harina de maíz', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 7],
            ['nombre' => 'Arroz integral', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 7],
            ['nombre' => 'Harina de trigo integral', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 7],
            ['nombre' => 'Amaranto', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 7],
            ['nombre' => 'Germen de trigo', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 7],
            ['nombre' => 'Frijoles negros', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 7],
            ['nombre' => 'Frijoles blancos', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 7],
            ['nombre' => 'lentejas', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 7],
            ['nombre' => 'Garbanzos', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 7],


            // ------------------ Frutos Secos y Semillas ---------------------------------------------
            ['nombre' => 'Almendras', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 8],
            ['nombre' => 'Nueces', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 8],
            ['nombre' => 'Anacardos (cashews)', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 8],
            ['nombre' => 'Pistachos', 'cantidad_ingredientes' => '1',  'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 8],
            ['nombre' => 'Cacahuetes (maní)', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 8],
            ['nombre' => 'Avellanas', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 8],
            ['nombre' => 'Macadamias', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 8],
            ['nombre' => 'Pecinas', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 8],
            ['nombre' => 'Semillas de girasol', 'cantidad_ingredientes' => '1',  'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 8],
            ['nombre' => 'Semillas de chía', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 8],
            ['nombre' => 'Semillas de lino', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 8],
            ['nombre' => 'Semillas de sésamo', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 8],
            ['nombre' => 'Semillas de calabaza', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 8],
            ['nombre' => 'Semillas de amapola', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 8],

            // ------------------ Aceites y Grasas ---------------------------------------------
            ['nombre' => 'Aceite de oliva', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'tazas', 'categoria_id' => 9],
            ['nombre' => 'Aceite vegetal', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'tazas', 'categoria_id' => 9],
            ['nombre' => 'Aceite de cacahuete', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'tazas', 'categoria_id' => 9],
            ['nombre' => 'Aceite de sésamo', 'cantidad_ingredientes' => '1',  'opcional' => 0, 'unidad' => 'tazas', 'categoria_id' => 9],
            ['nombre' => 'Aceite de coco', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'tazas', 'categoria_id' => 9],
            ['nombre' => 'Mantequilla', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 9],
            ['nombre' => 'Margarina', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 9],
            ['nombre' => 'Manteca de cerdo', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 9],
            ['nombre' => 'Aceite de manteca (shortening)', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 9],
            ['nombre' => 'Aceite de aguacate', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'tazas', 'categoria_id' => 9],
            ['nombre' => 'Aceite de nuez', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'tazas', 'categoria_id' => 9],

            // ------------------ Especias y Hierbas ---------------------------------------------
            ['nombre' => 'Pimienta negra', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'cucharaditas', 'categoria_id' => 10],
            ['nombre' => 'Pimienta blanca', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'cucharaditas', 'categoria_id' => 10],
            ['nombre' => 'Pimienta roja', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'cucharaditas', 'categoria_id' => 10],
            ['nombre' => 'Canela polvo', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'cucharaditas', 'categoria_id' => 10],
            ['nombre' => 'Canela rama', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'cucharaditas', 'categoria_id' => 10],
            ['nombre' => 'Nuez moscada', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'cucharaditas', 'categoria_id' => 10],
            ['nombre' => 'Cúrcuma', 'cantidad_ingredientes' => '1',  'opcional' => 0, 'unidad' => 'cucharaditas', 'categoria_id' => 10],
            ['nombre' => 'Pimentón picante', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'cucharaditas', 'categoria_id' => 10],
            ['nombre' => 'Pimentón dulce', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'cucharaditas', 'categoria_id' => 10],
            ['nombre' => 'Comino', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'cucharaditas', 'categoria_id' => 10],
            ['nombre' => 'Clavo de olor', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'cucharaditas', 'categoria_id' => 10],
            ['nombre' => 'Albahaca', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'cucharaditas', 'categoria_id' => 10],
            ['nombre' => 'Cilantro', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'cucharaditas', 'categoria_id' => 10],
            ['nombre' => 'Perejil', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'cucharaditas', 'categoria_id' => 10],
            ['nombre' => 'Tomillo', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'cucharaditas', 'categoria_id' => 10],
            ['nombre' => 'Orégano', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'cucharaditas', 'categoria_id' => 10],
            ['nombre' => 'Romero', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'cucharaditas', 'categoria_id' => 10],
            ['nombre' => 'Menta', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'cucharaditas', 'categoria_id' => 10],

            // ------------------ Salsas y Condimentos ---------------------------------------------
            ['nombre' => 'Salsa de soja', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'tazas', 'categoria_id' => 11],
            ['nombre' => 'Salsa de tomate (ketchup)', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'tazas', 'categoria_id' => 11],
            ['nombre' => 'Mayonesa', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'tazas', 'categoria_id' => 11],
            ['nombre' => 'Mostaza', 'cantidad_ingredientes' => '1',  'opcional' => 0, 'unidad' => 'tazas', 'categoria_id' => 11],
            ['nombre' => 'Salsa de barbacoa', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'tazas', 'categoria_id' => 11],
            ['nombre' => 'Ali oli', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'tazas', 'categoria_id' => 11],
            ['nombre' => 'Sal', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'cucharaditas', 'categoria_id' => 11],
            ['nombre' => 'Ajo en polvo', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'tazas', 'categoria_id' => 11],
            ['nombre' => 'Pimentón', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'tazas', 'categoria_id' => 11],
            ['nombre' => 'Cayena o chile en polvo', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'cucharaditas', 'categoria_id' => 11],
            ['nombre' => 'Cilantro molido', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'cucharaditas', 'categoria_id' => 11],
            ['nombre' => 'Curry en polvo', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'cucharaditas', 'categoria_id' => 11],
            ['nombre' => 'Azafrán', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'cucharaditas', 'categoria_id' => 11],
            ['nombre' => 'Tomate triturado', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'cucharaditas', 'categoria_id' => 11],

            // ------------------ Bebidas y líquidos ---------------------------------------------
            ['nombre' => 'Salsa picante (como el Tabasco)', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 12],
            ['nombre' => 'Jarabe de arce', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 12],
            ['nombre' => 'Melaza', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 12],
            ['nombre' => 'Vinagre', 'cantidad_ingredientes' => '1',  'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 12],
            ['nombre' => 'Zumo de frutas', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 12],
            ['nombre' => 'Vino', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 12],
            ['nombre' => 'Agua', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 12],
            ['nombre' => 'Leche', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 12],

            // ------------------ VERDURAS ---------------------------------------------
            ['nombre' => 'Tomates', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 13],
            ['nombre' => 'Zanahorias', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 13],
            ['nombre' => 'Espinacas', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 13],
            ['nombre' => 'Brócoli', 'cantidad_ingredientes' => '1',  'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 13],
            ['nombre' => 'Cebollas', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 13],
            ['nombre' => 'Ajo', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 13],
            ['nombre' => 'Pimiento rojo', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 13],
            ['nombre' => 'Pimiento verde', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 13],
            ['nombre' => 'Pimiento amarillo', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 13],
            ['nombre' => 'Calabacines', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 13],
            ['nombre' => 'Pepinos', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 13],
            ['nombre' => 'Champiñones', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 13],
            ['nombre' => 'Acelgas', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 13],

            // ------------------ HORTALIZAS ---------------------------------------------
            ['nombre' => 'Patatas', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 13],
            ['nombre' => 'Calabazas', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 13],
            ['nombre' => 'Berenjenas', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 13],
            ['nombre' => 'Apio', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 13],
            ['nombre' => 'Maíz', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 13],
            ['nombre' => 'Habas', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 13],
            ['nombre' => 'Alcachofas', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 13],
            ['nombre' => 'Rabanitos', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 13],
            ['nombre' => 'Judías verdes', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 13],
            ['nombre' => 'Alcachofas', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 13],
            ['nombre' => 'Puerros', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 13],
            ['nombre' => 'Lechuga iceberg', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 13],
            ['nombre' => 'Espinaca baby', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 13],
            ['nombre' => 'Hojas de mostaza', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 13],
            ['nombre' => 'Nabos', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 13],
            ['nombre' => 'Rábanos', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 13],
            ['nombre' => 'Boniato', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 13],
            ['nombre' => 'Yuca', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 13],
            ['nombre' => 'Hinojo', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 13],
            ['nombre' => 'Nabos', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 13],
            ['nombre' => 'Rábanos', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 13],
            ['nombre' => 'Coles de Bruselas', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 13],
            ['nombre' => 'Espárragos trigueros', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 13],
            ['nombre' => 'Rúcula', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 13],
            ['nombre' => 'Canónigos', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 13],
            ['nombre' => 'Jalapeños', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 13],
            ['nombre' => 'Capullos de ajo', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'g', 'categoria_id' => 13],

            // ------------------ Productos Fermentados ---------------------------------------------
            ['nombre' => 'Yogur', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 14],
            ['nombre' => 'Kéfir', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 14],
            ['nombre' => 'Kimchi', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 14],
            ['nombre' => 'Queso', 'cantidad_ingredientes' => '1',  'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 14],
            ['nombre' => 'Sauerkraut', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 14],
            ['nombre' => 'Miso', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 14],
            ['nombre' => 'Vinagre', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 14],
            ['nombre' => 'Kombucha', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 14],

            // ------------------  Alimentos a Base de Soja ---------------------------------------------
            ['nombre' => 'Tofu (queso de soja)', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 15],
            ['nombre' => 'Leche de soja', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 15],
            ['nombre' => 'Edamame', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 15],
            ['nombre' => 'Soja texturizada (soja texturizada de proteína):', 'cantidad_ingredientes' => '1',  'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 15],
            ['nombre' => 'Leche de soja condensada', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 15],
            ['nombre' => 'Leche de soja en polvo', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 15],
            ['nombre' => 'Miso', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 15],
            ['nombre' => 'Yogur de soja', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 15],

            // ------------------ Sustitutos de Carne y Productos Veganos ---------------------------------------------
            ['nombre' => 'Carne molida a base de plantas', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 16],
            ['nombre' => 'Nuggets a base de plantas', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 16],
            ['nombre' => 'Embutidos Vegetarianos', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 16],
            ['nombre' => 'Quesos veganos para untar', 'cantidad_ingredientes' => '1',  'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 16],
            ['nombre' => 'Quesos veganos rallados', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 16],
            ['nombre' => 'Yogur de soja, coco, almendra', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 16],
            ['nombre' => 'Huevos de chía o linaza', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 16],
            ['nombre' => 'Mayonesa vegana', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 16],

            // ------------------ Conservas y Alimentos en Lata ---------------------------------------------
            ['nombre' => 'Maíz enlatado', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ud', 'categoria_id' => 17],
            ['nombre' => 'Tomates enlatados', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ud', 'categoria_id' => 17],
            ['nombre' => 'Espárragos enlatados', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ud', 'categoria_id' => 17],
            ['nombre' => 'Lentejas enlatadas', 'cantidad_ingredientes' => '1',  'opcional' => 0, 'unidad' => 'ud', 'categoria_id' => 17],
            ['nombre' => 'Carne enlatada', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ud', 'categoria_id' => 17],
            ['nombre' => 'Mermelada y conservas de frutas', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ud', 'categoria_id' => 17],
            ['nombre' => 'Salsa de tomate enlatada', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ud', 'categoria_id' => 17],
            ['nombre' => 'Mariscos enlatados', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ud', 'categoria_id' => 17],
            ['nombre' => 'Pescados enlatados', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ud', 'categoria_id' => 17],
            ['nombre' => 'Verduras enlatados', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ud', 'categoria_id' => 17],
            ['nombre' => 'Frutas enlatados', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ud', 'categoria_id' => 17],

            // ------------------Productos Deshidratados o Liofilizados ---------------------------------------------
            ['nombre' => 'Pasas', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 18],
            ['nombre' => 'Manzanas deshidratadas', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 18],
            ['nombre' => 'Higos secos', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 18],
            ['nombre' => 'Plátanos deshidratados', 'cantidad_ingredientes' => '1',  'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 18],
            ['nombre' => 'Tomates deshidratados', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 18],
            ['nombre' => 'Cebollas deshidratadas', 'cantidad_ingredientes' => '1', 'opcional' => 0,'unidad' => 'ml', 'categoria_id' => 18],
            ['nombre' => 'Carne deshidratada (carne seca o jerky)', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 18],
            ['nombre' => 'Huevos en polvo', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 18],
            ['nombre' => 'Café liofilizado', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 18],
            ['nombre' => 'Sopas liofilizadas', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 18],
            ['nombre' => 'Frutas liofilizadas', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 18],
            ['nombre' => 'Vegetales liofilizados', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 18],

            // ------------------ Aderezos y Vinagres ---------------------------------------------
            ['nombre' => 'Aceite de Oliva Extra Virgen', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 19],
            ['nombre' => 'Vinagre Balsámico', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 19],
            ['nombre' => 'Vinagre de Vino Tinto', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 19],
            ['nombre' => 'Vinagre de Vino Blanco', 'cantidad_ingredientes' => '1',  'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 19],
            ['nombre' => 'Vinagre de Manzana', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 19],
            ['nombre' => 'Vinagre de Arroz', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 19],
            ['nombre' => 'Salsa de Soja', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 19],
            ['nombre' => 'Salsa de Tomate (Ketchup)', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 19],
            ['nombre' => 'Mostaza', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 19],
            ['nombre' => 'Aceite de Sésamo', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 19],
            ['nombre' => 'Aceite de Coco', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 19],
            ['nombre' => 'Aceite de Aguacate', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 19],
            ['nombre' => 'Aceite de Trufa', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 19],
            ['nombre' => 'Aderezo César', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 19],
            ['nombre' => 'Aderezo de Miel Mostaza', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 19],
            ['nombre' => 'Aderezo Italiano', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 19],
            ['nombre' => 'Aceite de girasol', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 19],

            // ------------------ Alimentos Integrales ---------------------------------------------
            ['nombre' => 'Frutas y Verduras Frescas', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 20],
            ['nombre' => 'Granos Enteros', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 20],
            ['nombre' => 'Legumbres', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 20],
            ['nombre' => 'Nueces y Semillas', 'cantidad_ingredientes' => '1',  'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 20],
            ['nombre' => 'Pescado Fresco', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 20],
            ['nombre' => 'Huevos', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 20],
            ['nombre' => 'Aceites No Refinados', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 20],
            ['nombre' => 'Harina de Trigo Integral', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 20],
            ['nombre' => 'Miel Cruda', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 20],
            ['nombre' => 'Cereales Integrales', 'cantidad_ingredientes' => '1',  'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 20],
            ['nombre' => 'Verduras de Hojas Verdes', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 20],
            ['nombre' => 'Aguacates', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 20],
            ['nombre' => 'Hierbas y Especias', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 20],
            ['nombre' => 'Productos Lácteos sin Procesar', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 20],

            // ------------------ Suplementos y Polvos ---------------------------------------------
            ['nombre' => 'Aminoácidos de Cadena Ramificada (BCAA)', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 21],
            ['nombre' => 'Creatina', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 21],
            ['nombre' => 'Quemadores de Grasa y Supresores del Apetito', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 21],
            ['nombre' => 'Curcumina', 'cantidad_ingredientes' => '1',  'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 21],
            ['nombre' => 'Cafeína en Píldoras o Polvo', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 21],
            ['nombre' => 'Aceite de Pescado', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 21],
            ['nombre' => 'Fibras en Polvo', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 21],
            ['nombre' => 'Probióticos', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 21],
            ['nombre' => 'Multivitaminas y Multiminerales', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 21],
            ['nombre' => 'Vitamina D', 'cantidad_ingredientes' => '1',  'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 21],
            ['nombre' => 'Hierro', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 21],
            ['nombre' => 'Ácido Fólico', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 21],
            ['nombre' => 'Colágeno en Polvo', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 21],
            ['nombre' => 'Proteína en Polvo', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 21],

            // ------------------ Alimentos Orgánicos y de Origen Local ---------------------------------------------
            ['nombre' => 'Cultivo sin Pesticidas Sintéticos', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 22],
            ['nombre' => 'No se Utilizan Antibióticos ni Hormonas de Crecimiento', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 2],
            ['nombre' => 'No se Usan OMG', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 22],
            ['nombre' => 'Certificación Orgánica', 'cantidad_ingredientes' => '1',  'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 22],
            ['nombre' => 'Frescura', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 22],
            ['nombre' => 'Variedad y Temporalidad', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 22],

            // ------------------ Especias y Condimentos Étnicos ---------------------------------------------
            ['nombre' => 'Cúrcuma (India)', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 23],
            ['nombre' => 'Comino (Oriente Medio y América Latina)', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 23],
            ['nombre' => 'Pimentón (España)', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 23],
            ['nombre' => 'Garam Masala (India)', 'cantidad_ingredientes' => '1',  'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 23],
            ['nombre' => 'Cilantro (México, Sudeste Asiático)', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 23],
            ['nombre' => 'Fenogreco (India)', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 23],
            ['nombre' => 'Azafrán (España, Oriente Medio)', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 23],
            ['nombre' => 'Jengibre(Asia)', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 23],


            // ------------------ Bebidas Alcohólicas y No Alcohólicas para Cocinar ---------------------------------------------
            ['nombre' => 'Vino Tinto', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 24],
            ['nombre' => 'Vino Blanco', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 24],
            ['nombre' => 'Vino de Jerez', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 24],
            ['nombre' => 'Brandy', 'cantidad_ingredientes' => '1',  'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 24],
            ['nombre' => 'Vermú', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 24],
            ['nombre' => 'Cerveza', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 24],
            ['nombre' => 'Whisky o Bourbon', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 24],
            ['nombre' => 'Café', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 24],
            ['nombre' => 'Cognac', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 24],
            ['nombre' => 'Caldo de Pescado', 'cantidad_ingredientes' => '1',  'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 24],
            ['nombre' => 'Soda de Jengibre', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 24],
            ['nombre' => 'Jugo de Naranja', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 24],
            ['nombre' => 'Caldo de Pollo o Verduras', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 24],
            ['nombre' => 'Jugo de Limón o Limón Fresco', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 24],

            // ------------------  Sustitutos del Azúcar y Harina ---------------------------------------------
            ['nombre' => 'Stevia', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 25],
            ['nombre' => 'Miel Cruda', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 25],
            ['nombre' => 'Jarabe de Arce Puro', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 25],
            ['nombre' => 'Harina de Almendras', 'cantidad_ingredientes' => '1',  'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 25],
            ['nombre' => 'Harina de Coco', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 25],
            ['nombre' => 'Harina de Avena', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 25],
            ['nombre' => 'Harina de Plátano Verde', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 25],
            ['nombre' => 'Harina de Yuca', 'cantidad_ingredientes' => '1', 'opcional' => 0, 'unidad' => 'ml', 'categoria_id' => 25],
        ];

        foreach ($ingredientes as $ingrediente) {
            // Verifica si el ingrediente ya existe en la base de datos
            $existente = Ingrediente::where('nombre', $ingrediente['nombre'])->first();

            if (!$existente) {
                // Crea un nuevo ingrediente en la base de datos
                Ingrediente::create($ingrediente);
            }
        }
    }
}
