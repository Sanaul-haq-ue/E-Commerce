@extends('admin.master')

@section('title','fskdfja;skdfj;ksdjf')

@section('body')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Product Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Product</a></li>
                <li class="breadcrumb-item active" aria-current="page">Show Product</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col-lg-10 offset-lg-1 col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Product Detail</h3>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th style="width: 30%">Category Name</th>
                            <td>{{ $product->category->name }}</td>
                        </tr>
                        <tr>
                            <th style="width: 30%">Sub Category Name</th>
                            <td>{{ $product->subCategory->name }}</td>
                        </tr>
                        <tr>
                            <th style="width: 30%">Brand Name</th>
                            <td>{{ $product->brand->name }}</td>
                        </tr>
                        <tr>
                            <th style="width: 30%">Unite Name</th>
                            <td>{{ $product->unite->name }}</td>
                        </tr>
                        <tr>
                            <th style="width: 30%">Product Color</th>
                            <td>
                                @foreach($product->colors as $color)
                                    <span>{{$color->color->name}}, </span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th style="width: 30%">Product Size</th>
                            <td>
                                @foreach($product->sizes as $size)
                                    <span>{{$size->size->name}}, </span>
                                @endforeach
                            </td>
                        </tr>

                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th style="width: 30%"></th>
                            <td>
                                <img src="{{ asset($product->image) }}" alt="Product Image" height="300">
                            </td>
                        </tr>
                        <tr>
                            <th style="width: 30%">Product Id</th>
                            <td>{{ $product->id }}</td>
                        </tr>
                        <tr>
                            <th style="width: 30%">Product Name</th>
                            <td>{{ $product->name }}</td>
                        </tr>
                        <tr>
                            <th style="width: 30%">Product Code</th>
                            <td>{{ $product->code }}</td>
                        </tr>
                        <tr>
                            <th style="width: 30%">Short Description</th>
                            <td>
                                <textarea class="form-control" readonly cols="30" rows="6">{{$product->short_description}}</textarea>
                            </td>
                        </tr>
                        <tr>
                            <th style="width: 30%">Long Description</th>
                            <td>
                                {!! $product->long_description !!}
                            </td>
                        </tr>
                        <tr>
                            <th style="width: 30%">Product Price</th>
                            <td>
                                <span>Regular Price: {{$product->regular_price }}</span>
                                <hr>
                                <span>Selling Price: {{$product->selling_price }}</span>
                            </td>
                        </tr>
                        <tr>
                            <th style="width: 30%">Stock Amount</th>
                            <td>{{$product->stock_amount}}</td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <table style="width: 100%;">
                                    <tr>
                                        <td colspan="2">
                                            <table style="width: 100%;">
                                                <tr>
                                                    <th style="width: 30%">Total View</th>
                                                    <td>{{$product->hit_count}}</td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td colspan="2">
                                            <table style="width: 100%;">
                                                <tr>
                                                    <th style="width: 30%">Total Sales</th>
                                                    <td>{{$product->sales_count}}</td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <table style="width: 100%;">
                                    <tr>
                                        <td colspan="2">
                                            <table style="width: 100%;">
                                                <tr>
                                                    <th style="width: 30%">Status</th>
                                                    <td>{{$product->status == 1 ? 'Published' : 'Unpublished'}}</td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td colspan="2">
                                            <table style="width: 100%;">
                                                <tr>
                                                    <th style="width: 30%">Featured Status</th>
                                                    <td>{{$product->featured_status == 1 ? 'Featured' : 'Not Featured'}}</td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <td>
                                @foreach($product->productGallaries as $productGallary)
                                    <img class="m-1" src="{{ asset($productGallary->product_Gallary) }}" alt="" height="120">
                                @endforeach
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>
    </div>

@endsection
