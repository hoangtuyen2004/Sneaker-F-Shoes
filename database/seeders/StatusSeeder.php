<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            ['name'=>'Chờ xử lý'],
            ['name'=>'Đang xử lý'],
            ['name'=>'Đang đóng gói'],
            ['name'=>'Đang giao hàng'],
            ['name'=>'Đã giao hàng'],
            ['name'=>'Đã hủy'],
            ['name'=>'Chờ thanh toán'],
            ['name'=>'Thanh toán thất bại'],
            ['name'=>'Hoàn thành'],
            ['name'=>'Xác nhận hoàn'],
            ['name'=>'Hoàn hàng'],
            ['name'=>'Giao hàng thất bại'],
            ['name'=>'Giao hàng thành công'],
        ];
        foreach ($data as $item) {
            Status::create($item);
        }
    }
}
