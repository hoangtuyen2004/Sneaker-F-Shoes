<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refund extends Model
{
    use HasFactory;
    protected $table = "refunds";
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
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'product_lists');
    }
    public function attribute() 
    {
        return $this->hasMany(Attribute::class)->onDelete('set null');
    }
}
