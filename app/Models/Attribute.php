<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    protected $table = "attributes";
    protected $fillable = [
        'sizes_id',
        'colors_id',
        'quanlity',
        'weight',
        'price',
        'product_id',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function url_image()
    {
        return $this->hasMany(Url_image::class);
    }
    public function colors()
    {
        return $this->belongsTo(Color::class);
    }
    public function sizes()
    {
        return $this->belongsTo(Size::class);
    }
    public function cart() {
        return $this->hasMany(Cart::class, 'attributes_id');
    }
    public function product_lists()
    {
        return $this->hasMany(Product_list::class);
    }
}
