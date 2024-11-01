<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = "orders";
    protected $fillable = [
        'order_code',
        'date_create',
        'users_id',
        'recipient_name',
        'phone_number',
        'city',
        'district',
        'commune',
        'location_description',
        'total',
        'vouchers_id',
        'discount_value',
        'coupons_value',
        'ship',
        'coin',
        'order_type',
    ];
    public function user()
    {
        return $this->belongsTo(User::class)->onDelete('set null');;
    }
    public function voucher() {
        return $this->belongsTo(Voucher::class);
    }
    public function product_lists()
    {
        return $this->hasMany(Product_list::class, 'orders_id');
    }
    public function payment()
    {
        return $this->belongsToMany(Payment::class, 'payments');
    }
    public function status_orders()
    {
        return $this->hasMany(Status_order::class, 'orders_id');
    }
}
