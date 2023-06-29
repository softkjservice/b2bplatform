<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
            'name' => 'Plotery płaskie Graphtec',
            'index' => '001',
            'categoryDescription' => 'Plotery tnąco bigujące serii FCX2000 / FCX4000',
            'parentCategory' => 0,
            'layotType' => 'LIST',
            'active' => true,
            'homePageActive' => true,
            'image_path' => 'category/001.jpg',
            'created_at' => date('y-m-d h:i:s'),
            'updated_at' => date('y-m-d h:i:s'),
            ],
            [
            'name' => 'Plotery Graphtec FC9000',
            'index' => '002',
            'categoryDescription' => 'Plotery rolkowe Graphtec serii FC9000',
            'parentCategory' => 0,
            'layotType' => 'LIST',
            'active' => true,
            'homePageActive' => true,
            'image_path' => 'category/002.jpg',
            'created_at' => date('y-m-d h:i:s'),
            'updated_at' => date('y-m-d h:i:s'),
            ],
            [
                'name' => 'Plotery Graphtec FC7000',
                'index' => '003',
                'categoryDescription' => 'Plotery rolkowe Graphtec serii FC7000',
                'parentCategory' => 0,
                'layotType' => 'LIST',
                'active' => true,
                'homePageActive' => true,
                'image_path' => 'category/003.jpg',
                'created_at' => date('y-m-d h:i:s'),
                'updated_at' => date('y-m-d h:i:s'),
            ],
            [
                'name' => 'Wykrojniki automatyczne',
                'index' => '004',
                'categoryDescription' => 'Automatyczny wykrojnik cyfrowy F-Mark',
                'parentCategory' => 0,
                'layotType' => 'LIST',
                'active' => true,
                'homePageActive' => true,
                'image_path' => 'category/004.jpg',
                'created_at' => date('y-m-d h:i:s'),
                'updated_at' => date('y-m-d h:i:s'),
            ],
            [
                'name' => 'Plotery płaskie iECHO',
                'index' => '005',
                'categoryDescription' => 'Plotery do grubych materiałów',
                'parentCategory' => 0,
                'layotType' => 'LIST',
                'active' => true,
                'homePageActive' => true,
                'image_path' => 'category/005.jpg',
                'created_at' => date('y-m-d h:i:s'),
                'updated_at' => date('y-m-d h:i:s'),
            ],

            [
                'name' => 'Akcesoria do ploterów Graphtec',
                'index' => '002',
                'categoryDescription' => 'ostrza, oprawki, bigownice, paski pod nóż',
                'parentCategory' => 0,
                'layotType' => 'LIST',
                'active' => true,
                'homePageActive' => true,
                'image_path' => 'category/006.jpg',
                'created_at' => date('y-m-d h:i:s'),
                'updated_at' => date('y-m-d h:i:s'),
            ]

        ]);

    }
}
