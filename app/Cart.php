<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

/**
 * @property mixed id
 */
class Cart extends Model
{
    /**
     * @var mixed
     */

    public function products() {
        return $this->morphToMany(Product::class, 'productable')->withPivot('quantity');
    }
}
