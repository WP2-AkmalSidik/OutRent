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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade'); // Hubungkan ke tabel customers
            $table->date('start_date'); // Tanggal mulai penyewaan
            $table->date('end_date'); // Tanggal akhir penyewaan
            $table->enum('status', ['pending', 'confirmed', 'completed', 'canceled'])->default('pending'); // Status booking
            $table->decimal('total_price', 10, 2); // Total harga sewa
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
