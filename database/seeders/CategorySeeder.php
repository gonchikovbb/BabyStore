<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory()
            ->count(5)
            ->sequence(
                ['name' => 'Одежда'],
                ['name' => 'Обувь'],
                ['name' => 'Спорт и отдых'],
                ['name' => 'Игрушки'],
                ['name' => 'Мебель']
                )
            ->create();
    }
}
