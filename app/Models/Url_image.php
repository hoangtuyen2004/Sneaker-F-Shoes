<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url_image extends Model
{
    use HasFactory;
    protected $table = "url_images";
    protected $fillable = [
        'url',
        'attributes_id',
    ];
    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }
}
