<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetails;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    private $customer, $order, $orderDetail;

    public function index()
    {
        return view('website.checkout.index');
    }

    public function newOrder(Request $request)
    {


        $this->customer = new Customer();
        $this->customer->name = $request->name;
        $this->customer->email = $request->email;
        $this->customer->phoneNumber = $request->phoneNumber;
        $this->customer->password = bcrypt($request->phoneNumber);
        $this->customer->save();

        $this->order = new Order();
        $this->order->customer_id       = $this->customer->id;
        $this->order->order_total       = $request->order_total;
        $this->order->tax_total         = $request->tax_total;
        $this->order->shipping_total    = $request->shipping_total;
        $this->order->order_date        = date('y-m-d');
        $this->order->order_timestamp   = strtotime(date('y-m-d'));
        $this->order->billing_address   = $request->billing_address;
        $this->order->city              = $request->city;
        $this->order->state             = $request->state;
        $this->order->zipcode           = $request->zipcode;
        $this->order->payment_option    = $request->payment_option;
        $this->order->save();

        foreach (Cart::content() as $item)
        {
            $this->orderDetail = new OrderDetails();
            $this->orderDetail->order_id = $this->order->id;
            $this->orderDetail->product_id      = $item->id;
            $this->orderDetail->product_name    = $item->name;
            $this->orderDetail->product_color   = $item->options->color;
            $this->orderDetail->product_size    = $item->options->size;
            $this->orderDetail->product_price   = $item->price;
            $this->orderDetail->product_qty     = $item->qty;
            $this->orderDetail->save();

            Cart::remove($item->rowId);

        }

        return redirect('/complete-order')->with('message', 'congratulation....your order post successfully, check your mail for conformation within 12 ours.');
    }

    public function completeOrder()
    {
        return view('website.checkout.complete-order');
    }
    
}
