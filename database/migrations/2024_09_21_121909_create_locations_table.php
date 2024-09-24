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
        // 
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->nullable()->constrained('users')->onDelete('cascade');//Mã khách hàng
            $table->string('location_name',255);//Tên địa chỉ
            $table->string('user_name', 255);//Tên người nhận
            $table->string('phone_number',20);//Số điện thoại
            $table->string('city_province',255);//Tỉnh thành phố
            $table->string('district',255);//Quận huyện
            $table->string('commune',255);//Xã
            $table->string('location_detail',255);//Địa chỉ chi tiết
            $table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
