<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            RolePermissionSeeder::class,
            UserSeeder::class,
            AttributeSeeder::class,
            ValueSeeder::class,
            ProductSeeder::class,
            DeliveryMethodSeeder::class,
            PaymentTypeSeeder::class,
            UserAddressSeeder::class,
            StatusSeeder::class,
            SettingSeeder::class,
            PaymentCardTypeSeeder::class,
        ]);
    }
}
