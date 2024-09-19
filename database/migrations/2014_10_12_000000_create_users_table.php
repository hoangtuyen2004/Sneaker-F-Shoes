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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('user_code');//Mã khách hàng
            $table->string('name');//Họ tên
            $table->string('email')->unique();//Email
            $table->date('birthday');//Ngày sinh
            $table->string('phone_number');//Số điện thoại
            $table->string('gender');//Giới tính
            $table->string('image')->nullable();//Ảnh
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
