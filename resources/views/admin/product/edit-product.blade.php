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
                <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <form class="form-horizontal" action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row d-flex">
            <div class="col-lg-9 col-md-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h3 class="card-title">Edit Product</h3>
                    </div>
                    <div class="card-body">
                        @if( session('messages') )
                            <p class="alert alert-success">{{ session('messages') }}</p>
                        @endif

                        <div class="row mb-4">
                            <label for="productName" class="col-md-3 form-label">Product name</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{ $product->name }}" name="name" id="productName" placeholder="Enter your Product name" type="text" required="required">
                                @if($errors->has('name'))
                                    <div class="alert alert-danger mt-1">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="productCode" class="col-md-3 form-label">Product code</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{ $product->code }}" name="code" id="productCode" placeholder="Enter your Product code" type="text" required="required">
                                @if($errors->has('code'))
                                    <div class="alert alert-danger mt-1">{{ $errors->first('code') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="short_description" class="col-md-3 form-label">Short Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="short_description" id="short_description" cols="30" rows="4" placeholder="Enter your Short Description">{{ $product->short_description }}</textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="long_description" class="col-md-3 form-label">Long Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="long_description" id="summernote" cols="30" rows="4" placeholder="Enter your Long Description">
                                    {{ $product->long_description }}
                                </textarea>
                            </div>
                        </div>
                        {{--                            <div class="row mb-4">--}}
                        {{--                                <label for="productImage" class="col-md-3 form-label">Product Image</label>--}}
                        {{--                                <div class="col-md-9">--}}
                        {{--                                    <input class="form-control" name="image" id="imgInp" type="file" accept="image"*/>--}}
                        {{--                                    <img class="mt-2" src="" id="productImage" alt="Product Image">--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Product Price</label>
                            <div class="col-md-9">
                                <div class="row input-group">
                                    <div class="w-50 price">
                                        <input class="form-control" value="{{ $product->regular_price }}" name="regular_price" placeholder="Enter your Regular price" type="number">
                                    </div>
                                    <div class="w-50">
                                        <input class="form-control" value="{{ $product->selling_price }}" name="selling_price" placeholder="Enter your Selling price" type="number">
                                    </div>
                                </div>
                                {{--                                    @if($errors->has('name'))--}}
                                {{--                                        <div class="alert alert-danger mt-1">{{ $errors->first('name') }}</div>--}}
                                {{--                                    @endif--}}
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="stockAmout" class="col-md-3 form-label">Stock Amout</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{ $product->stock_amount }}" name="stock_amount" id="stockAmout" placeholder="Stock Amout" type="number">
                                @if($errors->has('stock_amount'))
                                    <div class="alert alert-danger mt-1">{{ $errors->first('stock_amount') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <label for="email" class="col-md-3 form-label">Publication Status</label>
                            <div class="col-md-9 mt-2 p">
                                <label><input type="radio" value="1" {{ $product->status == 1 ? 'checked' : ''}} name="status"><span>Published</span></label>
                                <label><input type="radio" value="0" {{ $product->status == 0 ? 'checked' : ''}} name="status"><span>UnPublished</span></label>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card">
                    <div class="card-header border-bottom">
                        <h3 class="card-title">Product Gallary</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <input type="file" name="product_gallaries[]" accept="image" multiple />
                        </div>
                        <div class="">
                            @foreach($product->productGallaries as $productGallary)
                                <img class="m-1" src="{{ asset($productGallary->product_Gallary) }}" height="120" alt="">
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-12">
                <div class="row">
                    <div class="card">
                        <label for="categoryName" class="form-label">Category name</label>
                        <div class="pb-3">
                            <select class="form-control" onchange="setSubCategory(this.value)" name="category_id" id="categoryName">
                                <option value="" disabled selected> -- Select Category --</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('category_id'))
                                <div class="alert alert-danger mt-1">{{ $errors->first('category_id') }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="card">
                        <label for="sub_category_id" class="form-label">Sub Category name</label>
                        <div class="pb-3">
                            <select class="form-control" name="sub_category_id" id="subCategoryId">
                                <option value="" disabled selected> -- Select Sub Category --</option>
                                @foreach($sub_categories as $sub_category)
                                    <option value="{{ $sub_category->id }}" {{ $product->sub_category_id == $sub_category->id ? 'selected' : ''}}>{{$sub_category->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('sub_category_id'))
                                <div class="alert alert-danger mt-1">{{ $errors->first('sub_category_id') }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="card">
                        <label for="brand_id" class="form-label">Brand name</label>
                        <div class="pb-3">
                            <select class="form-control" name="brand_id" id="brand_id">
                                <option value="" disabled selected> -- Select Brand --</option>
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}" {{ $product->brand_id == $brand->id ? 'selected' : ''}}>{{$brand->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('brand_id'))
                                <div class="alert alert-danger mt-1">{{ $errors->first('brand_id') }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="card">
                        <label for="unite_id" class="form-label">Unite name</label>
                        <div class="pb-3">
                            <select class="form-control" name="unite_id" id="unite_id">
                                <option value="" disabled selected> -- Select Unite --</option>
                                @foreach($unites as $unite)
                                    <option value="{{ $unite->id }}" @selected($product->unite_id == $unite->id)>{{$unite->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('unite_id'))
                                <div class="alert alert-danger mt-1">{{ $errors->first('unite_id') }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="card">
                        <label for="color_id" class="form-label">Product Color</label>
                        <div class="pb-3 form-group">
                            <select multiple class="form-control select2-show-search form-select"  name="colors[]" id="color_id" data-placeholder="Choose Color">
                                @foreach($colors as $color)
                                    <option value="{{ $color->id }}" @foreach($product->colors as $singlecolor) @selected($color->id == $singlecolor->color_id) @endforeach>{{$color->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('colors'))
                                <div class="alert alert-danger mt-1">{{ $errors->first('colors') }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="card">
                        <label for="size_id" class="form-label">Product Size</label>
                        <div class="pb-3 form-group">
                            <select multiple class="form-control select2-show-search form-select"  name="sizes[]" id="size_id" data-placeholder="Choose Size">
                                @foreach($sizes as $size)
                                    <option value="{{ $size->id }}" @foreach($product->sizes as $singlsize) @selected($size->id == $singlsize->size_id) @endforeach>{{$size->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('sizes'))
                                <div class="alert alert-danger mt-1">{{ $errors->first('sizes') }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="card">
                        <label for="productImage" class="form-label">Product Image</label>
                        <div class="pb-3">
                            <div class="form-control">
                                <input type="file" name="image" class="dropify" data-height="200" accept="image"*/>
                                <img src="{{asset( $product->image )}}" data-height="200" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="card">
                        <button class="btn btn-primary" type="submit">Update Product</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
