<?php

namespace P4;

use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    public function gardens() {
        return $this->belongsToMany('P4\Garden')->withTimestamps();
    }
}
