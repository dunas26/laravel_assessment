<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    protected $table = "tables";

    public function restaurants() {
        return $this->belongsToMany(Restaurant::class, 'restaurant_id', 'id');
    }
}
