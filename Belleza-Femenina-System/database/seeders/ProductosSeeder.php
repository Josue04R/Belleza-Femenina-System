<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductosSeeder extends Seeder
{
    public function run(): void
    {
        $categorias = [
            ['categoria' => 'Reductoras', 'descripcion' => 'Fajas colombianas reductoras de alta compresión'],
            ['categoria' => 'Postparto', 'descripcion' => 'Fajas colombianas para recuperación postparto'],
            ['categoria' => 'Deportivas', 'descripcion' => 'Fajas colombianas para entrenamientos y deporte'],
            ['categoria' => 'Modeladoras', 'descripcion' => 'Fajas colombianas para moldear y definir la figura'],
        ];

        $categoriaIds = [];
        foreach ($categorias as $cat) {
            DB::table('categorias')->insert([
                'categoria'   => $cat['categoria'],
                'descripcion' => $cat['descripcion'],
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
            $id = DB::table('categorias')
                ->where('categoria', $cat['categoria'])
                ->where('descripcion', $cat['descripcion'])
                ->orderByDesc('id_cate')
                ->value('id_cate');
            $categoriaIds[] = $id;
        }

        $tallas = ['S', 'M', 'L', 'XL'];
        $tallaIds = [];
        foreach ($tallas as $t) {
            DB::table('tallas')->insert([
                'talla'      => $t,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $id = DB::table('tallas')
                ->where('talla', $t)
                ->orderByDesc('id_talla')
                ->value('id_talla');
            $tallaIds[] = $id;
        }

        $productos = [
            ['Faja Colombiana Cintura Alta', 'Moldeate', $categoriaIds[0], 'Látex y algodón', 'Faja reductora colombiana con compresión alta', 34.99, 'activo'],
            ['Faja Colombiana Body Completo', 'SlimWear', $categoriaIds[3], 'Microfibra', 'Faja body colombiana con tirantes ajustables', 49.00, 'activo'],
            ['Faja Colombiana Deportiva', 'SportShape', $categoriaIds[2], 'Neopreno', 'Faja chaleco deportiva para sudoración', 36.50, 'activo'],
            ['Faja Colombiana Postparto Soporte', 'FitMama', $categoriaIds[1], 'Algodón', 'Faja postparto colombiana con soporte lumbar', 42.00, 'activo'],
            ['Faja Colombiana Chaleco', 'BodyForm', $categoriaIds[3], 'Látex', 'Faja chaleco colombiana moldeadora', 45.50, 'activo'],
            ['Faja Colombiana Cintura Media', 'SlimWear', $categoriaIds[0], 'Algodón', 'Faja colombiana de compresión media', 31.00, 'activo'],
            ['Faja Colombiana Invisible', 'SoftShape', $categoriaIds[0], 'Lycra', 'Faja colombiana invisible bajo la ropa', 33.50, 'activo'],
            ['Faja Colombiana Alta Compresión', 'Moldeate', $categoriaIds[0], 'Látex', 'Faja reductora colombiana de alta compresión', 39.99, 'activo'],
            ['Faja Colombiana Deportiva Chaleco', 'SportShape', $categoriaIds[2], 'Neopreno', 'Faja colombiana deportiva tipo chaleco', 37.90, 'activo'],
            ['Faja Colombiana Postparto Completa', 'RecoverWear', $categoriaIds[1], 'Microfibra', 'Faja postparto colombiana de cuerpo completo', 46.00, 'activo'],
            ['Faja Colombiana Short Reductor', 'Moldeate', $categoriaIds[0], 'Spandex', 'Short reductor colombiano para cadera y muslo', 30.00, 'activo'],
            ['Faja Colombiana Deportiva Cintura Alta', 'SportShape', $categoriaIds[2], 'Neopreno', 'Faja colombiana deportiva cintura alta', 35.20, 'activo'],
            ['Faja Colombiana Modeladora de Cintura', 'BodyForm', $categoriaIds[3], 'Elastano', 'Faja modeladora colombiana de cintura', 41.75, 'activo'],
            ['Faja Colombiana Ultra Modeladora', 'BodyForm', $categoriaIds[3], 'Látex y spandex', 'Faja colombiana ultra modeladora de figura', 48.00, 'activo'],
            ['Faja Colombiana Postparto Invisible', 'FitMama', $categoriaIds[1], 'Lycra', 'Faja postparto colombiana invisible', 39.50, 'activo'],
        ];

        foreach ($productos as $p) {
            DB::table('productos')->insert([
                'nombre_p'    => $p[0],
                'marca_p'     => $p[1],
                'id_cate'     => $p[2],
                'material'    => $p[3],
                'descripcion' => $p[4],
                'precio'      => $p[5],
                'imagen'      => null,
                'estado'      => $p[6],
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);

            $productoId = DB::table('productos')
                ->where('nombre_p', $p[0])
                ->where('marca_p', $p[1])
                ->orderByDesc('id_producto')  // Cambiado de id a id_producto
                ->value('id_producto');

            foreach ($tallaIds as $index => $tallaId) {
                $precioVariante = $p[5] + ($index * 2.50);
                DB::table('variantes_productos')->insert([
                    'id_producto' => $productoId,
                    'id_talla'    => $tallaId,
                    'color'       => 'Negro',
                    'stock'       => rand(5, 20),
                    'precio'      => $precioVariante,
                    'created_at'  => now(),
                    'updated_at'  => now(),
                ]);
            }
        }
    }
}
