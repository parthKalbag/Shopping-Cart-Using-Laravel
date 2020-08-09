<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Payment;

class Order extends Model
{
    protected $fillable = [
        'status', 'customer_id',
    ];

    public function payment() {
        return $this->hasOne(Payment::class);
    }

    public function user() {
        return $this->belongsTo('user', 'customer_id');
    }
}
