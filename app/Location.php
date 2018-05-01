<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    /**
     * Get the clients for this location.
     */
    public function clients()
    {
        return $this->hasMany('App\Client');
    }
}
