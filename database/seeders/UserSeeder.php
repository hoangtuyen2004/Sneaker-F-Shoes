<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            [
                'user_code' => 'KH_0',
                'name' => 'User_name',
                'email' => 'username@gmail.com',
                'phone_number' => '0123456789',
                'gender' => 'Nam',
                'password' => 'username@gmail.com',
                'status'=> 'Hoạt động',
                'role' => 'Khách hàng',
            ],
            [
                'user_code' => 'NV_0',
                'name' => 'Admin_name',
                'email' => 'adminname@gmail.com',
                'phone_number' => '0123456789',
                'gender' => 'Nữ',
                'password' => 'adminname@gmail.com',
                'status'=> 'Hoạt động',
                'role' => 'Quản lý',
            ],
        ];
        foreach ($data as $item) {
            User::create($item);
        }
    }
}
