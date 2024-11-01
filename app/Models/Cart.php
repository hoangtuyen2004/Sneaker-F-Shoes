<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = "carts";
    protected $fillable = [
        'users_id',
        'attributes_id',
        'quanlity',
    ];
    public function users() {
        return $this->belongsTo(User::class,'users_id');
    }
    public function attributes() {
        return $this->belongsTo(Attribute::class, 'attributes_id');
    }
}
