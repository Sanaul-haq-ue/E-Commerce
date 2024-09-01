<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetails;
use Gloudemans\Shoppingcart\Facades\Cart;
use Session;
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
        if($customerId = Session::get('customer_id'))
        {
            $this->customer = Customer::find($customerId);
            // $this->customer = Customer::where('email', $request->email)->orWhere('phoneNumber', $request->phoneNumber)->first();
            if(!$this->customer)
            {
                $this->customer = Customer::newCustomer($request);

                Session::put('customer_id', $this->customer->id);
                Session::put('customer_name', $this->customer->name);
            }

        }
        else
        {
            $this->customer = Customer::where('email', $request->email)->orWhere('phoneNumber', $request->phoneNumber)->first();
            if(!$this->customer)
            {
                $this->customer = Customer::newCustomer($request);
            }
            Session::put('customer_id', $this->customer->id);
            Session::put('customer_name', $this->customer->name);
        }
        

        // Session::put('customer_id', $this->customer->id);
        // Session::put('customer_name', $this->customer->name);

        $this->order = Order::newOrder($this->customer, $request);

        OrderDetails::newOrderDetails($this->order);

        return redirect('/complete-order')->with('message', 'congratulation....your order post successfully, check your mail for conformation within 12 ours.');
    }

    public function completeOrder()
    {
        
        return view('website.checkout.complete-order');
    }
    
}
