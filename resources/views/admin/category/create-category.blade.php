@extends('admin.master')

@section('title','fskdfja;skdfj;ksdjf')

@section('body')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Category Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Category</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Category</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col-lg-10 offset-lg-1 col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Add Category Form</h3>
                </div>
                <div class="card-body">
                    @if( session('message') )
                        <p class="alert alert-success">{{ session('message') }}</p>
                    @endif
                    <form class="form-horizontal" action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Category name</label>
                            <div class="col-md-9">
                                <input class="form-control" name="name" id="firstName" placeholder="Enter your Category name" type="text" required="required">
                                @if($errors->has('name'))
                                    <div class="alert alert-danger mt-1">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="description" class="col-md-3 form-label">Category Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="description" id="description" cols="30" rows="4" placeholder="Enter your Category Description"></textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="image" class="col-md-3 form-label">Category Image</label>
                            <div class="col-md-9">
                                <input class="form-control" name="image" id="imgInp" type="file" accept="image"*/>
                                <img class="mt-2" src="" id="categoryImage" alt="Category Image">
                                @if($errors->has('image'))
                                    <div class="alert alert-danger mt-1">{{ $errors->first('image') }}</div>
                                @endif
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
