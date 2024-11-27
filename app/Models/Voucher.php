<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;
    protected $table = "vouchers";
    protected $fillable = [
        'name',
        'voucher_code',
        'value',
        'decreased_value',
        'max_value',
        'quantity',
        'remaining',
        'condition',
        'date_start',
        'date_end',
        'type_code',
        'description',
    ];
}
