<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Jānis Bērzs',
            'email' => 'janis.berzs@example.com',
        ]);
        DB::table('users')->insert([
            'name' => 'Līga Ozola',
            'email' => 'liga.ozola@example.com',
        ]);

        DB::table('items')->insert([
            'name' => 'Televizors',
            'price' => 20000,
        ]);
        DB::table('items')->insert([
            'name' => 'Austiņas',
            'price' => 2500,
        ]);
        DB::table('items')->insert([
            'name' => 'Zāles pļāvējs',
            'price' => 40000,
        ]);
    }
}
