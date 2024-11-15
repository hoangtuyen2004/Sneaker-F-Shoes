<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            [
                'name'=>'40',
                'size_code'=>'40',
            ],
            [
                'name'=>'41',
                'size_code'=>'41',
            ],
            [
                'name'=>'42',
                'size_code'=>'42',
            ],
            [
                'name'=>'43',
                'size_code'=>'43',
            ],
            [
                'name'=>'44',
                'size_code'=>'44',
            ],
            [
                'name'=>'45',
                'size_code'=>'45',
            ],
            [
                'name'=>'46',
                'size_code'=>'46',
            ],
            [
                'name'=>'47',
                'size_code'=>'47',
            ],
            [
                'name'=>'48',
                'size_code'=>'48',
            ],
        ];
        foreach ($data as $item) {
            Size::create($item);
        }
    }
}
