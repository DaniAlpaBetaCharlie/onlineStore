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
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // auto increment primary key
            $table->string('name', 150); // kasih batasan panjang
            $table->text('description')->nullable(); // deskripsi bisa nullable
            $table->string('image')->nullable(); // gambar bisa kosong dulu
            $table->integer('price')->unsigned(); // harga jangan negatif
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
