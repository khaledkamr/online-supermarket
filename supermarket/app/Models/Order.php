<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'total', 'status', 'first_name', 'last_name', 'address', 'city',
        'country', 'postcode', 'mobile', 'email', 'order_notes', 'shipping_method',
        'shipping_cost', 'payment_method',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
