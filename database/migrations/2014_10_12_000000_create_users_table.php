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
        //Bảng người dùng
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('user_code',10)->unique();//Mã khách hàng
            $table->string('name',255);//Họ tên
            $table->string('email',255)->unique();//Email
            $table->date('birthday')->nullable();//Ngày sinh
            $table->string('phone_number',20);//Số điện thoại
            $table->enum('gender', ['Nam', 'Nữ', 'Khác']);//Giới tính
            $table->string('image')->nullable();//Ảnh
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');//Mật khẩu
            $table->enum('status',['Hoạt động', 'Đã khóa', 'Xóa']);//Trạng thái tài khoản
            $table->enum('role', ['Khách hàng', 'Nhân viên', 'Quản lý']);//Chức vụ
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
