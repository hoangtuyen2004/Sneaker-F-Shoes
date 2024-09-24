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
        //Danh sách mua
        Schema::create('product_lists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('products_id')->constrained('products')->onDelete('cascade');//Mã sản phẩm
            $table->foreignId('attributes_id')->constrained('attributes')->onDelete('cascade');//Mã biến thể
            $table->string('product_name',255);//Tên sản phẩm
            $table->string('color_name',255);//Tên màu sắc
            $table->string('size_name',255);//Tên kích thước
            $table->float('price',12,2);//Đơn giá
            $table->float('sale',12,2)->nullable();//Giảm giá từ cửa hàng
            $table->integer('quanlity');//Số lượng
            $table->float('coin', 12,2);//Thành tiền
            $table->foreignId('orders_id')->constrained('orders')->onDelete('cascade');//Mã hóa đơn
            $table->string('note',255)->nullable();//Ghi chú
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_lists');
    }
};
