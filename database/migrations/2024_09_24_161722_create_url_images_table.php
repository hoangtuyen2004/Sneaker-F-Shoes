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
        // Bảng lưu chữ ảnh
        Schema::create('url_images', function (Blueprint $table) {
            $table->id();
            $table->string('url',255);//Link ảnh
            $table->foreignId('attributes_id')->constrained('attributes')->onDelete('cascade');//Mã biến thể
            $table->timestamps();//Ngày tạo
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('url_images');
    }
};
