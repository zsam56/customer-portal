<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * Get the clients for this product (who have it as their primary).
     */
    public function clients()
    {
        return $this->hasMany('App\Client');
    }
}
