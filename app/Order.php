<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Payment;

class Order extends Model
{
    protected $fillable = [
        'status'
    ];

    public function payment() {
        return $this->hasOne(Payment::class);
    }
}
