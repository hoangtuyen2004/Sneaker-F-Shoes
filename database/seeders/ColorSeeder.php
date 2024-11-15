<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            [
                'name'=>'Black',
                'color_code'=>'#000000',
            ],
            [
                'name'=>'White',
                'color_code'=>'#FFFFFF',
            ],
            [
                'name'=>'Red',
                'color_code'=>'#FF0000',
            ],
            [
                'name'=>'Lime',
                'color_code'=>'#00FF00',
            ],
            [
                'name'=>'Blue',
                'color_code'=>'#0000FF',
            ],
            [
                'name'=>'Yellow',
                'color_code'=>'#FFFF00',
            ],
            [
                'name'=>'Aqua',
                'color_code'=>'#00FFFF',
            ],
            [
                'name'=>'Magenta',
                'color_code'=>'#FF00FF',
            ],
            [
                'name'=>'Silver',
                'color_code'=>'#C0C0C0',
            ],
        ];
        foreach ($data as $item) {
            Color::create($item);
        }
    }
}
