<?php

namespace Database\Seeders;

use App\Enums\SettingType;
use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Language
        $setting = Setting::create([
            'name' => [
                'uz' => 'Til',
                'ru' => 'Язык',
            ],
            'type' => SettingType::SELECT->value,
        ]);

        $setting->values()->create([
            'name' => [
                'uz' => 'O\'zbekcha',
                'ru' => 'O\'zbekcha',
            ],
        ]);

        $setting->values()->create([
            'name' => [
                'uz' => 'Русский',
                'ru' => 'Русский',
            ],
        ]);

        // Money type
        $setting = Setting::create([
            'name' => [
                'uz' => 'Pul turi',
                'ru' => 'Валюта',
            ],
            'type' => SettingType::SELECT->value,
        ]);

        $setting->values()->create([
            'name' => [
                'uz' => 'UZS',
                'ru' => 'UZS',
            ],
        ]);

        $setting->values()->create([
            'name' => [
                'uz' => 'USD',
                'ru' => 'USD',
            ],
        ]);

        // Dark mode
        $setting = Setting::create([
            'name' => [
                'uz' => 'Dark mode',
                'ru' => 'Темная тема',
            ],
            'type' => SettingType::SWITCH->value,
        ]);

        // Notification
        $setting = Setting::create([
            'name' => [
                'uz' => 'Bildirishnomalar',
                'ru' => 'Уведомления',
            ],
            'type' => SettingType::SWITCH->value,
        ]);


    }
}
