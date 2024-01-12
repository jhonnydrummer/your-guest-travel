<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Esportes', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Culinária', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Natureza', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Cultura', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('categories')->insert($categories);
    }
}
