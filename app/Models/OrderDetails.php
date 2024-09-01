<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cart;

class OrderDetails extends Model
{
    private static $orderDetail;

    use HasFactory;

    public static function newOrderDetails($order)
    {
        foreach (Cart::content() as $item)
        {
            
            self::$orderDetail = new OrderDetails();
            self::$orderDetail->order_id        = $order->id;
            self::$orderDetail->product_id      = $item->id;
            self::$orderDetail->product_name    = $item->name;
            self::$orderDetail->product_color   = $item->options->color;
            self::$orderDetail->product_size    = $item->options->size;
            self::$orderDetail->product_price   = $item->price;
            self::$orderDetail->product_qty     = $item->qty;
            self::$orderDetail->save();
            
            Cart::remove($item->rowId);

        }
    }
}
