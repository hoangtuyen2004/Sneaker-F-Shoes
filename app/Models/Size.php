<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;
    protected $table = "sizes";
    protected $fillable = [
        'name',
        'size_code',
    ];
    public function attribute()
    {
        return $this->hasMany(Attribute::class);
    }
}
