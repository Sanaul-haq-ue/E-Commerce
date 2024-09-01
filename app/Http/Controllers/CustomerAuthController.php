<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Session;

class CustomerAuthController extends Controller
{
    private $customer, $order;
    public function index()
    {
        return view('website.customer.login');
    }

    public function loginCheck(Request $request)
    {
        $this->customer = Customer::where('email', $request->user_name)->orWhere('phoneNumber', $request->user_name)->first();
        if($this->customer)
        {
            if(password_verify($request->password, $this->customer->password))
            {
                Session::put('customer_id', $this->customer->id);
                Session::put('customer_name', $this->customer->name);
                return redirect('/my-dashboard');
            }
            else
            {
                return back()->with('message', 'password in correct');
            }
        
        }
        else
        {
            return back()->with('message', 'Your Email / Phone is not valid');
        }
    }
    public function newCustomer(Request $request)
    {
        $this->customer = Customer::newCustomer($request);

        Session::put('customer_id', $this->customer->id);
        Session::put('customer_name', $this->customer->name);

        return redirect('/my-dashboard');

    }

    public function logOut(Request $request)
    {
        Session::forget('customer_id');
        Session::forget('customer_name');
        return redirect('/');
    }

    public function myDashboard()
    {
        $this->order = Order::where('customer_id', Session::get('customer_id'))->orderBy('id', 'desc')->get();
        return view('website.customer.my-dashboard',
        [
            'orders' => $this->order
        ]);
    }
}
