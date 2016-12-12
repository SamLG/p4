<?php

namespace P4;

use Illuminate\Database\Eloquent\Model;

class Garden extends Model
{
    public function plants()
    {
        # With timetsamps() will ensure the pivot table has its created_at/updated_at fields automatically maintained
        return $this->belongsToMany('P4\Plant')->withTimestamps();
    }

    public function wishlistplants()
    {
        # With timetsamps() will ensure the pivot table has its created_at/updated_at fields automatically maintained
        return $this->belongsToMany('P4\Wishlistplant')->withTimestamps();
    }
}
