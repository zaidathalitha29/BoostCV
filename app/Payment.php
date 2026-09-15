<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'order_id',
        'amount',
        'method',
        'proof',
        'status',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
