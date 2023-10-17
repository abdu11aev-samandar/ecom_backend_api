<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::find(2)->addresses()->create([
            'latitude' => 41.311081,
            'longitude' => 69.240562,
            'region' => 'Tashkent',
            'district' => 'Mirzo Ulugbek',
            'street' => 'Bogishamol',
            'house' => '1',
        ]);

        User::find(2)->addresses()->create([
            'latitude' => 41.311081,
            'longitude' => 70.240562,
            'region' => 'Tashkent',
            'district' => 'Ulugbek',
            'street' => 'Bogishamol',
            'house' => '2',
        ]);
    }
}
