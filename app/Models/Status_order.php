<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status_order extends Model
{
    use HasFactory;
    protected $table = "status_orders";
    protected $fillable = [
        'statuses_id',
        'name_status',
        'date_update',
        'note',
        'orders_id',
        'users_id',
    ];
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'status_orders');
    }
    public function statu()
    {
        return $this->belongsToMany(Status::class, 'statuses');
    }
}
