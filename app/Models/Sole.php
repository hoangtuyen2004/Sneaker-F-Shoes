<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sole extends Model
{
    use HasFactory;
    protected $table = "soles";
    protected $fillable = [
        'name',
    ];
}
