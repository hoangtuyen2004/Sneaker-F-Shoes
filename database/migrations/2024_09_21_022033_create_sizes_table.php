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
        //Bảng kích cỡ
        Schema::create('sizes', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);//Tên kích cỡ
            $table->string('size_code');//Mã kích cỡ
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sizes');
    }
};
