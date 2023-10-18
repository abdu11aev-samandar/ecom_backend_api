<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Status::create([
            'name' => [
                'uz' => 'Yangi',
                'ru' => 'Новый',
            ],
            'code' => 'new',
            'for' => 'order',
        ]);

        Status::create([
            'name' => [
                'uz' => 'Tasdiqlandi',
                'ru' => 'Подтвержден',
            ],
            'code' => 'confirmed',
            'for' => 'order',
        ]);

        Status::create([
            'name' => [
                'uz' => 'Ishlanmoqda',
                'ru' => 'В обработке',
            ],
            'code' => 'processing',
            'for' => 'order',
        ]);

        Status::create([
            'name' => [
                'uz' => 'Yetkazib berilyapti',
                'ru' => 'Доставляется',
            ],
            'code' => 'shipping',
            'for' => 'order',
        ]);

        Status::create([
            'name' => [
                'uz' => 'Yetkazib berildi',
                'ru' => 'Доставлен',
            ],
            'code' => 'delivered',
            'for' => 'order',
        ]);

        Status::create([
            'name' => [
                'uz' => 'Tugalandi',
                'ru' => 'Завершен',
            ],
            'code' => 'completed',
            'for' => 'order',
        ]);

        Status::create([
            'name' => [
                'uz' => 'Yopildi',
                'ru' => 'Закрыт',
            ],
            'code' => 'closed',
            'for' => 'order',
        ]);

        Status::create([
            'name' => [
                'uz' => 'Bekor qilindi',
                'ru' => 'Отменен',
            ],
            'code' => 'canceled',
            'for' => 'order',
        ]);

        Status::create([
            'name' => [
                'uz' => 'Qaytarildi',
                'ru' => 'Возвращен',
            ],
            'code' => 'refunded',
            'for' => 'order',
        ]);

        Status::create([
            'name' => [
                'uz' => 'To`lov kutilmoqda',
                'ru' => 'Ожидается оплата',
            ],
            'code' => 'waiting_payment',
            'for' => 'order',
        ]);

        Status::create([
            'name' => [
                'uz' => 'To`lov amalga oshirildi',
                'ru' => 'Оплата прошла успешно',
            ],
            'code' => 'paid',
            'for' => 'order',
        ]);

        Status::create([
            'name' => [
                'uz' => 'To`lovda xatolik',
                'ru' => 'Ошибка оплаты',
            ],
            'code' => 'payment_error',
            'for' => 'order',
        ]);
    }
}
