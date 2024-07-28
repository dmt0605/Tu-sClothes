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
            $table->id();
            $table->string('tensp', 100)->unique();
            $table->string('moTa', 1000)->nullable();
            $table->dateTime('ngayCapNhat')->nullable();
            $table->integer('gia');
            $table->integer('giaKM')->nullable();
            $table->string('urlHinh', 200)->nullable();
            $table->integer('soLuongTonKho')->default(0);
            $table->boolean('anHien')->default(1);
            $table->unsignedBigInteger('idLoai');
            $table->timestamps();
            $table->foreign('idLoai')->references('id')->on('categories')->onUpdate('restrict')->onDelete('restrict');
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
