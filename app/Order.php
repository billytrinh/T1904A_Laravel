<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = ['user_id','customer_name','shipping_address','telephone','grand_total','payment_method',
        'status'];

    const STATUS_PENDING = 0;
    const STATUS_PROCESS = 1;
    const STATUS_SHIPPING = 2;
    const STATUS_COMPLETE = 3;
    const STATUS_CANCEL = 4;
}
