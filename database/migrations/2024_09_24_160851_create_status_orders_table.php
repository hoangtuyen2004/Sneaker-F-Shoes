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
        // Trạng thái đơn hàng
        Schema::create('status_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('statuses_id')->constrained('statuses')->onDelete('cascade');
            $table->string('name_status');//Tên trạng thái
            $table->dateTime('date_update');//Ngày cập nhật
            $table->string('note',255)->nullable();//Ghi chú
            $table->foreignId('orders_id')->constrained('orders')->onDelete('cascade');//Mã hóa đơn
            $table->foreignId('users_id')->nullable()->constrained('users')->onDelete('cascade');//Nhân viên xác nhận
            $table->timestamps();//Ngày tạo
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('status_orders');
    }
};
