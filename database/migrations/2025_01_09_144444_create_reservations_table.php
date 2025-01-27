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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama pelanggan
            $table->string('phone'); // Nomor telepon pelanggan
            $table->string('table_number'); // Nomor meja
            $table->enum('payment_method', ['Cash', 'Credit Card', 'E-Wallet']); // Metode pembayaran
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
