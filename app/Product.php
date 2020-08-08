<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed id
 */
class Product extends Model
{
    protected $fillable = [
      'title', 'description','price','stock','status',
    ];
}
