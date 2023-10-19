<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'email' => 'admin@admin.com',
            'phone' => '+9999999',
            'password' => Hash::make('password')
        ]);
        $user->assignRole('admin');

        $user = User::create([
            'first_name' => 'Editor',
            'last_name' => 'Editor01',
            'email' => 'editor@user.com',
            'phone' => '+99999997',
            'password' => Hash::make('password')
        ]);
        $user->assignRole('editor');

        $user = User::create([
            'first_name' => 'Shop',
            'last_name' => 'Manager01',
            'email' => 'managet@user.com',
            'phone' => '+99999996',
            'password' => Hash::make('password')
        ]);
        $user->assignRole('shop-manager');

        $user = User::create([
            'first_name' => 'Helpdesk',
            'last_name' => 'Support01',
            'email' => 'support@user.com',
            'phone' => '+99999995',
            'password' => Hash::make('password')
        ]);
        $user->assignRole('helpdesk-support');

        $user = User::create([
            'first_name' => 'User',
            'last_name' => 'User01',
            'email' => 'user@user.com',
            'phone' => '+99999998',
            'password' => Hash::make('password')
        ]);
        $user->assignRole('customer');

        $users = User::factory()->count(10)->create();
        foreach ($users as $user) {
            $user->assignRole('customer');
        }
    }
}
