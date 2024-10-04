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
        //Bảng kho voucher
        Schema::create('voucher_ware', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained('users')->onDelete('cascade');//Mã người dùng
            $table->foreignId('vouchers_id')->constrained('vouchers')->onDelete('cascade');//Mã voucher
            $table->enum('status',['Chưa sử dụng', 'Đã sữ dụng']);//Trạng thái
            $table->timestamps();//Ngày tạo
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voucher_ware');
    }
};
