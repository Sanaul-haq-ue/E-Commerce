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
                <li class="breadcrumb-item active" aria-current="page">Manage Order</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Manage Order Form</h3>
                </div>
                <div class="card-body">
                    @if( session('success') )
                        <p class="alert alert-success">{{ session('success') }}</p>
                    @endif
                    @if( session('message') )
                        <p class="alert alert-success">{{ session('message') }}</p>
                    @endif
                    <div class="table-responsive">
                        <table id="example3" class="table table-bordered text-nowrap border-bottom">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">Sl No.</th>
                                <th class="border-bottom-0">Order Id</th>
                                <th class="border-bottom-0">Order Total</th>
                                <th class="border-bottom-0">Order Date</th>
                                <th class="border-bottom-0">Order Status</th>
                                <th class="border-bottom-0">Customer info</th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->order_total }}</td>
                                    <td>{{ $order->order_date }}</td>
                                    <td>{{ $order->order_status}}</td>
                                    <td>{{ isset($order->customer->name) ? $order->customer->name : ""}} ({{ isset($order->customer->phoneNumber) ? $order->customer->phoneNumber: ""}})</td>
                                    <td class="d-flex">
                                        <a href="{{route('order-view', $order->id)}}" class="btn btn-info btn-sm me-1" title="View Order Detail">
                                            <i class=" fa fa-eye"></i>
                                        </a>
                                        <a href="{{route('order-edit', $order->id)}}" class="btn btn-info btn-sm me-1" title="Order Edit">
                                            <i class=" fa fa-edit"></i>
                                        </a>
                                        <a href="" class="btn btn-success btn-sm me-1" title="View Order invoice">
                                            <i class=" fa fa-eye"></i>
                                        </a>
                                        <a href="" class="btn btn-success btn-sm me-1" title="Download Order invoice">
                                            <i class=" fa fa-download"></i>
                                        </a>
                                        <form method="post" action="{{route('order-delete', $order->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
