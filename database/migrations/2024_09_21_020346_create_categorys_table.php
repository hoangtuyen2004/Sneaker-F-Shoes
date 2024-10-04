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
        //Bảng danh mục (loại giày)
        Schema::create('categorys', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);//Tên danh mục
            $table->timestamps();//Ngày tạo
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categorys');
    }
};
