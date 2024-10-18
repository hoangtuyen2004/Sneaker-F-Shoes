<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $table = "locations";
    protected $fillable = [
        'user_id',
        'location_name',
        'user_name',
        'phone_number',
        'city_province',
        'district',
        'commune',
        'location_detail',
        'status'
    ];
    public function users() {
        return $this->belongsToMany(User::class);
    }
}
