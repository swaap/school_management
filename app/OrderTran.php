<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderTran extends Model
{
    protected $fillable = [
        'order_id','item_name','item_quantity','mass_id','item_price'
    ];

    public function replies() {
        return $this->belongsTo('App\Order', 'order_id', 'id');
    }

    public function mass() {
        return $this->belongsTo('App\Mass', 'mass_id', 'id');
    }
}
