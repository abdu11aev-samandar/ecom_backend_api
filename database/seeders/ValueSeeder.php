<?php

namespace Database\Seeders;

use App\Models\Value;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Value::create([
            'attribute_id' => 1,
            'name' => [
                'uz' => 'Qizil',
                'ru'=> 'Красный',
            ]
        ]);

        Value::create([
            'attribute_id' => 1,
            'name' => [
                'uz' => 'Yashil',
                'ru'=> 'Зеленый',
            ]
        ]);

        Value::create([
            'attribute_id' => 1,
            'name' => [
                'uz' => 'Oq',
                'ru'=> 'Белый',
            ]
        ]);
    }
}
