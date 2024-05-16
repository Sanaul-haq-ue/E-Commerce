@extends('admin.master')

@section('title','fskdfja;skdfj;ksdjf')

@section('body')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Sub Category Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Sub Category</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Sub Category</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col-lg-10 offset-lg-1 col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Add Sub Category Form</h3>
                </div>
                <div class="card-body">
                    @if( session('message') )
                        <p class="alert alert-success">{{ session('message') }}</p>
                    @endif
                    <form class="form-horizontal" action="{{ route('sub-category.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-4">
                            <label for="categoryName" class="col-md-3 form-label">Category name</label>
                            <div class="col-md-9">
                                <select class="form-control" name="category_id" id="categoryName">
                                    <option value="" disabled selected> -- Select Category --</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('category_id'))
                                    <div class="alert alert-danger mt-1">{{ $errors->first('category_id') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Sub Category name</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{ old('name') }}" name="name" id="firstName" placeholder="Enter your Sub Category name" type="text" required="required">
                                @if($errors->has('name'))
                                    <div class="alert alert-danger mt-1">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="description" class="col-md-3 form-label">Sub Category Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="description" id="description" cols="30" rows="4" placeholder="Enter your Sub Category Description"></textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="image" class="col-md-3 form-label">Sub Category Image</label>
                            <div class="col-md-9">
                                <input class="form-control" name="image" id="imgInp" type="file" accept="image"*/>
                                <img class="mt-2" src="" id="categoryImage" alt="Sub Category Image">
                            </div>
                        </div>
                        <div class="row">
                            <label for="email" class="col-md-3 form-label">Publication Status</label>
                            <div class="col-md-9 mt-2 p">
                                <label ><input type="radio" value="1" checked name="status"><span>Published</span></label>
                                <label><input type="radio" value="0" name="status"><span>UnPublished</span></label>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
