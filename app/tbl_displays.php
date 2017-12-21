<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_displays extends Model
{

    public function  movie()
    {
        return $this->hasOne('App\tbl_movies', 'id');
    }

    public function  theater()
    {
        return $this->hasOne('App\tbl_theather');
    }

    public function  age()
    {
        return $this->hasOne('App\tbl_age_catogories', 'id');
    }

    public function  chair()
    {
        return $this->hasOne('App\tbl_chairs');
    }

    public function ticket()
    {
        return $this->belongsTo('App\tbl_ticket', 'display_id');
    }
}
