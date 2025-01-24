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
        Schema::create('booking_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained('bookings')->onDelete('cascade'); // Hubungkan ke tabel bookings
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade'); // Hubungkan ke tabel products
            $table->integer('quantity'); // Jumlah barang yang disewa
            $table->decimal('price_per_day', 10, 2); // Harga per hari
            $table->decimal('total_price', 10, 2); // Total harga untuk item ini
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_details');
    }
};
