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
        // Bảng thanh toán
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('orders_id')->constrained('orders')->onDelete('cascade');//Mã hóa đơn
            $table->float('amount',12,2);//Số tiền
            $table->enum('trading',['Thanh toán', 'Hoàn tiền']);//Loại giao dịch
            $table->enum('payment_method',['Tiền mặt', 'Chuyển khoản']);//Phương thức thanh toán
            $table->string('note',255)->nullable();//Ghi chú
            $table->foreignId('users_id')->nullable()->constrained('users')->onDelete('cascade');//Nhân viên xác nhận
            $table->timestamps();//Ngày tạo
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
