<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
    ];

	public function OrderTrans() {
        return $this->hasMany('App\OrderTran', 'order_id', 'id');
    }
	public function user() {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

}
