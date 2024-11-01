<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_list extends Model
{
    use HasFactory;
    protected $table = 'product_lists';
    protected $fillable = [
        'attributes_id',
        'product_name',
        'color_name',
        'size_name',
        'price',
        'sale',
        'quanlity',
        'coin',
        'orders_id',
        'note',
    ];
    public function order()
    {
        return $this->belongsToMany(Order::class);
    }
    public function attribute() 
    {
        return $this->belongsToMany(Attribute::class)->onDelete('set null');
    }
}
