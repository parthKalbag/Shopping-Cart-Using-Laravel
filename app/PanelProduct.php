<?php

namespace App;

class PanelProduct extends Product
{
    protected $table = 'products';

    protected static function booted() {
        // static::addGlobalScope(new AvailableScope);
    }
}