<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_age_catogories extends Model
{
    public function tbl_displays()
    {
        return $this->belongsTo('App\tbl_displays', 'age_id');
    }
}
