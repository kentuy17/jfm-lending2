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
        Schema::create('daily_collections', function (Blueprint $table) {
            $table->id();
            $table->integer('loan_id');
            $table->integer('client_id');
            $table->double('interest_amount',10,2);
            $table->double('daily_principal');
            $table->double('daily_interest');
            $table->double('daily_paid');
            $table->string('status');
            $table->string('remaining_balance');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_collections');
    }
};
