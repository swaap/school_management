<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GlobalSetting extends Model {

    protected $fillable = [
        'name', 'value'
    ];

}
