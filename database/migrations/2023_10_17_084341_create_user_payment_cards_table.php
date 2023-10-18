<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_payment_cards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('payment_card_type_id')->constrained('payment_card_types')->cascadeOnDelete()->cascadeOnUpdate();
            $table->text('name')->nullable();
            $table->text('number');
            $table->text('last_four_numbers');
            $table->text('exp_date');
            $table->text('holder_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_payment_cards');
    }
};
