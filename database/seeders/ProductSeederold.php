<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::all();
        //dd($categories[0]->id);
        DB::table('products')->insert([
            [
                'name' => 'Plotery tnąco bigujący Graphtec FCX4000-50',
                'index' => '001',
                'barcode'=>"111",
                'quantity'=> 10,
                'unit'=>"szt.",
                'price'=>50000,
                'currency'=>"PLN",
                'vat_rate'=>23,
                'description'=>'Ploter płaski tnąco bigujący formar B2',
                'category_id'=>1,
                'priority'=>'a01',
                'active'=>true,
                'homePageActive'=>true,
                'image_path' => 'product/FCX4000-50.jpg',
                'created_at' => date('y-m-d h:i:s'),
                'updated_at' => date('y-m-d h:i:s'),
            ],
            [
                'name' => 'Plotery tnąco bigujący Graphtec FCX4000-60',
                'index' => '001',
                'barcode'=>"111",
                'quantity'=> 10,
                'unit'=>"szt.",
                'price'=>60000,
                'currency'=>"PLN",
                'vat_rate'=>23,
                'description'=>'Ploter płaski tnąco bigujący formar B1',
                'category_id'=>1,
                'priority'=>'a01',
                'active'=>true,
                'homePageActive'=>true,
                'image_path' => 'product/FCX4000-60.jpg',
                'created_at' => date('y-m-d h:i:s'),
                'updated_at' => date('y-m-d h:i:s'),
            ]


        ]);
    }
}
