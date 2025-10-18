<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'grand_total',
        'payment_method',
        'status',
        'shipping_amount',
        'shipping_method',
        'shipping_address',
        'notes',
    ];

    public function user () {
        return $this->belongsTo(User::class);
    }

    public function items() {
        return $this->hasMany(OrderItems::class);
    }

    public function address(){
        return $this->hasMany(Address::class);
    }
}
