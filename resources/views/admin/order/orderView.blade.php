@extends('admin.master')

@section('title','fskdfja;skdfj;ksdjf')

@section('body')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Order Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Order</a></li>
                <li class="breadcrumb-item active" aria-current="page">Order View</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Order Detail</h3>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>Order Id</th>
                            <td>{{ $order->id }}</td>
                        </tr>
                        <tr>
                            <th>Order Date</th>
                            <td>{{ $order->order_date }}</td>
                        </tr>
                        <tr>
                            <th>Order Total</th>
                            <td>{{ $order->order_total }}</td>
                        </tr>
                        <tr>
                            <th>Tax Total</th>
                            <td>{{ $order->tax_total }}</td>
                        </tr>
                        <tr>
                            <th>Shipping Total</th>
                            <td>{{ $order->shipping_total }}</td>
                        </tr>
                        <tr>
                            <th>Customer Info</th>
                            <td>{{$order->customer->name}}</td>
                        </tr>
                        <tr>
                            <th>Order Status</th>
                            <td>{{$order->order_status}}</td>
                        </tr>
                        <tr>
                            <th>Payment Method</th>
                            <td>{{$order->payment_option}}</td>
                        </tr>
                        <tr>
                            <th>Payment Status</th>
                            <td>{{$order->payment_status}}</td>
                        </tr>
                        <tr>
                            <th>Payment Amount</th>
                            <td>{{$order->payment_amount}}</td>
                        </tr>
                        <tr>
                            <th>Payment Date</th>
                            <td>{{$order->payment_date}}</td>
                        </tr>
                        <tr>
                            <th>Currency</th>
                            <td>{{$order->currency}}</td>
                        </tr>
                        <tr>
                            <th>Transaction Id</th>
                            <td>{{$order->transaction_id}}</td>
                        </tr>

                    </table>


                    <hr>

                    <h4>Product Information</h4>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Product Id</th>
                                <th>Product Name</th>
                                <th>Product Price</th>
                                <th>Product Qty</th>
                                <th>Product Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->orderDetails as $orderDetail)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$orderDetail->product_id}}</td>
                                <td>{{$orderDetail->product_name}}</td>
                                <td>{{$orderDetail->product_price}}</td>
                                <td>{{$orderDetail->product_qty}}</td>
                                <td>{{$orderDetail->product_price * $orderDetail->product_qty}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <hr>
                    
                    <h4>Delivery Information</h4>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Delivery Address</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Zipcode</th>
                                <th>Delivery Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$order->billing_address}}</td>
                                <td>{{$order->city}}</td>
                                <td>{{$order->state}}</td>
                                <td>{{$order->zipcode}}</td>
                                <td>{{$order->delivery_status}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
