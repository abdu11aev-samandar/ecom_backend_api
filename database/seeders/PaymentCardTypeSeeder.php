<?php

namespace Database\Seeders;

use App\Models\PaymentCardType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentCardTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PaymentCardType::create([
            'name' => 'Visa',
            'code' => 'visa',
            'icon' => 'visa.png',
        ]);

        PaymentCardType::create([
            'name' => 'MasterCard',
            'code' => 'mastercard',
            'icon' => 'mastercard.png',
        ]);

        PaymentCardType::create([
            'name' => 'American Express',
            'code' => 'amex',
            'icon' => 'amex.png',
        ]);
    }
}
