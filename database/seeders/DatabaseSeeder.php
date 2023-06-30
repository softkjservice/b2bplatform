<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('users')->delete();
        DB::table('products')->delete();
        DB::table('categories')->delete();
        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
            UserSeeder::class
        ]);
    }
}
