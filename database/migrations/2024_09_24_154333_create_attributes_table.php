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
        // bảng Biến thể
        Schema::create('attributes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sizes_id')->constrained('sizes')->onDelete('cascade');//Mã size
            $table->foreignId('colors_id')->constrained('colors')->onDelete('cascade');//Mã màu
            $table->integer('quanlity');//Số lượng
            $table->float('price',12,2);//Giá
            $table->foreignId('products_id')->constrained('products')->onDelete('cascade');//Mã sản phẩm
            $table->timestamps();//Ngày tạo
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attributes');
    }
};
