<?php

namespace App;

use App\Scopes\AvailableScope;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed id
 * @property mixed price
 * @property mixed pivot
 */
class Product extends Model
{    
    protected $table = 'products';
    
    protected $with = 'images';

    protected $fillable = [
      'title', 'description','price','stock','status',
    ];

    protected static function booted() {
        static::addGlobalScope(new AvailableScope);
    }

    public function carts() {
        return $this->morphedByMany(Cart::class, 'productable')->withPivot('quantity');
    }

    public function orders() {
        return $this->morphedByMany(Order::class, 'productable')->withPivot('quantity');
    }

    public function images() {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function scopeAvailable($query) {
        return $query->where('status', 'available');
    }

    public function getTotalAttribute() {
       return $this->price * $this->pivot->quantity;
    }

}
