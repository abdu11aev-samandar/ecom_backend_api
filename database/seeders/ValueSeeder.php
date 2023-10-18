<?php

namespace Database\Seeders;

use App\Models\Attribute;
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
        $attribute = Attribute::find(1);

        $attribute->values()->create([
            'name' => [
                'uz' => 'Qizil',
                'ru'=> 'Красный',
            ]
        ]);

        $attribute->values()->create([
            'name' => [
                'uz' => 'Yashil',
                'ru'=> 'Зеленый',
            ]
        ]);

        $attribute->values()->create([
            'name' => [
                'uz' => 'Oq',
                'ru'=> 'Белый',
            ]
        ]);
    }
}
