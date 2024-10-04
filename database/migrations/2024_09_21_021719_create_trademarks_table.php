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
        //Bảng thương hiệu
        Schema::create('trademarks', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);//Tên thương hiệu
            $table->timestamps();//Ngày tạo
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trademarks');
    }
};
