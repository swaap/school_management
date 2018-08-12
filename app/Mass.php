<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mass extends Model
{
    protected $table = 'masses';
    protected $fillable = [
        'mass_name',
    ];

     public function orderTrans() {
        return $this->hasOne('App\orderTran', 'mass_id', 'id');
    }

}
