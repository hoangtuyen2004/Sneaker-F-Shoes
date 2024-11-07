<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = "payments";
    protected $fillable = [
        'orders_id',
        'amount',
        'trading',
        'payment_method',
        'note',
        'users_id',//Nhân viên xác nhận!
    ];
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'payments');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
