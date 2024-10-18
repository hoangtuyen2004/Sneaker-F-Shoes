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
        //Bảng sự kiện giảm giá
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->string('name');//Tên sk
            $table->string('img_banner')->nullable();//Ảnh banner
            $table->float('value',12,2);//Giá trị giảm(%)
            $table->dateTime('date_start');
            $table->dateTime('date_end');
            $table->string('description', 555);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discounts');
    }
};
