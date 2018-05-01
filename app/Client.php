<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    /**
     * Get the location that the client belongs to.
     */
    public function location()
    {
        return $this->belongsTo('App\Location');
    }

}
