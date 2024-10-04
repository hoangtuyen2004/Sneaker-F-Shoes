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
        //Bảng sản phẩm
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('categorys_id')->constrained('categorys')->onDelete('cascade');//Mã danh mục
            $table->foreignId('soles_id')->constrained('soles')->onDelete('cascade');//Mã đế giày
            $table->foreignId('materials_id')->constrained('materials')->onDelete('cascade');//Mã chất liệu
            $table->foreignId('trademarks_id')->constrained('trademarks')->onDelete('cascade');//Mã thương hiệu
            $table->string('description')->nullable();//Mô tả sản phẩm
            $table->enum('status',['Đang bán', 'Dừng bán']);//Trạng thái
            $table->timestamps();//Ngày tạo
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
