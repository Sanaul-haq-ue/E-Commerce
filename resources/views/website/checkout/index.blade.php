@extends('website.master')

@section('title')
    Ecommerce Website - CheckOut page
@endsection


@section('body')
<main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index-2.html" rel="nofollow">Home</a>
                    <span></span> Shop
                    <span></span> Checkout
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <form method="post" action="{{route('checkout.new-order')}}">
                @csrf
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        @if (Session::get('customer_id'))

                        <div class="mb-25">
                            <h4>Billing Details</h4>
                        </div>

                        <div class="form-group">
                            <span><a href="" class="btn btn-fill-out btn-block mt-30">Change Billing Address</a></span>
                        </div>
                        
                        @else

                        <div class="mb-25">
                            <h4>Billing Details</h4>
                        </div>
                        
                            <div class="form-group">
                                <input type="text" required="" name="name" placeholder="Full name *">
                            </div>
                            <div class="form-group">
                                <input type="emil" required="" name="email" placeholder="Email Address *">
                            </div>
                            <div class="form-group">
                                <input required="" type="number" name="phoneNumber" placeholder="Phone Number">
                            </div>
                            <div class="form-group">
                                <input type="text" name="billing_address" required="" placeholder="Address *">
                            </div>
                            <div class="form-group">
                                <input required="" type="text" name="city" placeholder="City / Town *">
                            </div>
                            <div class="form-group">
                                <input required="" type="text" name="state" placeholder="State / County *">
                            </div>
                            <div class="form-group">
                                <input required="" type="text" name="zipcode" placeholder="Postcode / ZIP *">
                            </div>
                        @endif
                            
                        
                    </div>
                    <div class="col-md-6">
                        <div class="order_review">
                            <div class="mb-20">
                                <h4>Your Orders</h4>
                            </div>
                            <div class="table-responsive order_table text-center">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Product</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php($sum = 0)
                                        @foreach (Cart::content() as $item)
                                        <tr>
                                            <td class="image product-thumbnail"><img src="{{asset($item->options->image)}}" alt="#"></td>
                                            <td>
                                                <h5><a href="shop-product-full.html">{{$item->name}}</a></h5> <span class="product-qty">x {{$item->qty}}</span>
                                            </td>
                                            <td>TK. {{round($item->subtotal)}}</td>
                                        </tr>
                                        @php($sum= $sum + $item->subtotal)
                                        @endforeach
                                        <tr>
                                            <th>SubTotal</th>
                                            <td class="product-subtotal" colspan="2">TK. {{$sum}}</td>
                                        </tr>
                                        <tr>
                                            <th>Tax 15%</th>
                                            <td class="product-subtotal" colspan="2">TK. {{$tax = round($sum * 0.15)}}</td>
                                        </tr>
                                        <tr>
                                            <th>Shipping</th>
                                            <td colspan="2"><em>Tk. {{$shipping = 60}}</em></td>
                                        </tr>
                                        <tr>
                                            <th>Total</th>
                                            <td colspan="2" class="product-subtotal"><span class="font-xl text-brand fw-900">Tk. {{$order_total = $sum + $shipping + $tax}}</span></td>
                                        </tr>
                                    </tbody>
                                    <input type="hidden" name="order_total" value="{{$order_total}}">
                                    <input type="hidden" name="shipping_total" value="{{$shipping}}">
                                    <input type="hidden" name="tax_total" value="{{$tax}}">
                                </table>
                            </div>
                            <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                            <div class="payment_method">
                                <div class="mb-25">
                                    <h5>Payment</h5>
                                </div>
                                <div class="form-group">
                                    <div class="custome-radio">
                                        <input class="form-check-input" required="" type="radio" name="payment_option" value="cash" id="exampleRadios3" checked="">
                                        <label class="form-check-label" for="exampleRadios3" data-bs-toggle="collapse" data-target="#bankTranfer" aria-controls="bankTranfer">cash</label>
                                    </div>
                                    <div class="custome-radio">
                                        <input class="form-check-input" required="" type="radio" name="payment_option" value="online" id="exampleRadios4" checked="">
                                        <label class="form-check-label" for="exampleRadios4" data-bs-toggle="collapse" data-target="#checkPayment" aria-controls="checkPayment">Online</label>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-fill-out btn-block mt-30">Place Order</button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </section>
    </main>
@endsection