<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory()
            ->count(3)
            ->sequence(
                ['name' => 'Футболка', 'category_id' => 1],
                ['name' => 'Кросовки', 'category_id' =>  2],
                ['name' => 'Самокат', 'category_id' =>  3],
                ['name' => 'Мячь', 'category_id' =>  4],
                ['name' => 'Кроватка', 'category_id' =>  5]
            )
            ->create();
    }
}
