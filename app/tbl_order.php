<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_order extends Model
{
    protected $table = 'tbl_order';
    public function tbl_tickets()
    {
        return $this->hasMany('App\tbl_tickets');
    }
}
