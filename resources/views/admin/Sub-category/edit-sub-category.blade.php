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
                <li class="breadcrumb-item active" aria-current="page">Edit Sub Category</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col-lg-10 offset-lg-1 col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Edit Sub Category Form</h3>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('sub-category.update',$sub_category->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row mb-4">
                            <label for="categoryName" class="col-md-3 form-label">Category name</label>
                            <div class="col-md-9">
                                <select class="form-control" name="category_id" id="categoryName">
                                    <option value="" disabled selected> -- Select Category --</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $sub_category->category_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
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
                                <input class="form-control" value="{{ $sub_category->name }}" name="name" id="firstName" placeholder="Enter your Sub Category name" type="text" required="required">
                                @if($errors->has('name'))
                                    <div class="alert alert-danger mt-1">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="description" class="col-md-3 form-label">Sub Category Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="description" id="description" cols="30" rows="4" placeholder="Enter your Sub Category Description">{{ $sub_category->description }}</textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="image" class="col-md-3 form-label">Sub Category Image</label>
                            <div class="col-md-9">
                                <input class="form-control" name="image" id="imgInp" type="file" accept="image"*/>
                                <img class="mt-2" src="{{ asset($sub_category->image) }}" id="categoryImage" alt="" width="120" height="100">
                                @if($errors->has('image'))
                                    <div class="alert alert-danger mt-1">{{ $errors->first('image') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <label for="email" class="col-md-3 form-label">Publication Status</label>
                            <div class="col-md-9 mt-2 p">
                                <label ><input type="radio" value="1" {{ $sub_category->status == 1 ? 'checked' : '' }} checked name="status"><span>Published</span></label>
                                <label><input type="radio" value="0" {{ $sub_category->status == 0 ? 'checked' : '' }} name="status"><span>UnPublished</span></label>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
