<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => [
                'uz' => 'Stol',
                'ru' => 'Стол',
            ],
        ]);

        Category::create([
            'name' => [
                'uz' => 'Divan',
                'ru' => 'Диван',
            ],
        ]);

        Category::create([
            'name' => [
                'uz' => 'Oshxona',
                'ru' => 'Кухня',
            ],
        ]);

        Category::create([
            'name' => [
                'uz' => 'Yotoqxona',
                'ru' => 'Спальня',
            ],
        ]);

        Category::create([
            'name' => [
                'uz' => 'Bolalar',
                'ru' => 'Детская',
            ],
        ]);
    }
}
