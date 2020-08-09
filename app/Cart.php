<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Cart extends Model
{
    public function products() {
        return $this->morphToMany(Product::class, 'productable')->withPivot('quantity');
    }
}
