<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
            'name' => 'Admin',
            'email' => 'kj@ploter.eu',
            'role' => 'admin',
            'password' => '$2y$10$3HfyZ2yd/mrxoa1kjr02DeFREPa9945BEnv9oO0nqd3o8NrQ9L0PS'],
            [
                'name' => 'User',
                'email' => 'user@ploter.eu',
                'role' => 'user',
                'password' => '$2y$10$3HfyZ2yd/mrxoa1kjr02DeFREPa9945BEnv9oO0nqd3o8NrQ9L0PS'],
            [
                'name' => 'Gość',
                'email' => 'gosc@ploter.eu',
                'role' => 'user',
                'password' => '$2y$10$3HfyZ2yd/mrxoa1kjr02DeFREPa9945BEnv9oO0nqd3o8NrQ9L0PS']
        ]);
    }
}
