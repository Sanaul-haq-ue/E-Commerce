<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    private static $order;
    use HasFactory;

    public static function newOrder($customer, $request)
    {
        self::$order = new Order();
        self::$order->customer_id       = $customer->id;
        self::$order->order_total       = $request->order_total;
        self::$order->tax_total         = $request->tax_total;
        self::$order->shipping_total    = $request->shipping_total;
        self::$order->order_date        = date('y-m-d');
        self::$order->order_timestamp   = strtotime(date('y-m-d'));
        self::$order->billing_address   = $request->billing_address;
        self::$order->city              = $request->city;
        self::$order->state             = $request->state;
        self::$order->zipcode           = $request->zipcode;
        self::$order->payment_option    = $request->payment_option;
        self::$order->save();

        return self::$order;
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetails::class);
    }
}
