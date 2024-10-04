<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'categorys_id',
        'soles_id ',
        'materials_id',
        'trademarks_id',
        'description',
        'status',
    ];
    public function categorys()
    {
        return $this->belongsTo(Category::class);
    }
    public function soles()
    {
        return $this->belongsTo(Sole::class);
    }
    public function materials() {
        return $this->belongsTo(Material::class);
    }
    public function trademarks()
    {
        return $this->belongsTo(Trademark::class);
    }
}
