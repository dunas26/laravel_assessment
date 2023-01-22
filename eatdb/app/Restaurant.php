<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $table = 'restaurants';
    protected $keytype = 'bigint';

    public function tables() {
        return $this->hasMany(Table::class, 'restaurant_id', 'id');
    }
}
