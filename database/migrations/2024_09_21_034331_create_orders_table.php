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
        //Bảng đặt hàng
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_code',10);//Mã hóa đơn
            $table->dateTime('date_create');//Ngày tạo đơn
            $table->foreignId('users_id')->nullable()->constrained('users')->onDelete('cascade');//Mã khách hàng
            $table->string('recipient_name',255);//Tên người nhận
            $table->string('phone_number',20);
            $table->string('city');//Thành phố
            $table->string('district');//Quận huyện
            $table->string('commune');//Xã
            $table->string('location_description');//Địa chỉ chi tiết
            $table->float('total',12,2);//Tổng tiền hàng
            $table->foreignId('vouchers_id')->nullable()->constrained('vouchers')->onDelete('cascade');//Mã giảm giá
            $table->float('discount_value',12,2)->default(0);//Giảm giá từ của hàng
            $table->float('coupons_value',12,2)->default(0);//Giả giá từ phiếu giảm giá
            $table->float('ship',12,2)->default(0);//Phí vận chuyển
            $table->float('coin',12,2);//Thành tiền đơn hàng
            $table->enum('order_type',['Đơn tại quầy', 'Đơn online']);//Loại đơn hàng
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
