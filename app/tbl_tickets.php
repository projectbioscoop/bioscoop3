<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_tickets extends Model
{
    public function display()
    {
        return $this->hasOne('App\tbl_displays','id');
    }

    public function tbl_order()
    {
        return $this->belongsTo('App\tbl_order');
    }
}
