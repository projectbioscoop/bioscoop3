<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_theather extends Model
{
    public function tbl_displays()
    {
        return $this->belongsTo('App\tbl_displays');
    }
}
