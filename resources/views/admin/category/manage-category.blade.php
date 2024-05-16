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
                <li class="breadcrumb-item active" aria-current="page">Manage Category</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col-lg-10 offset-lg-1 col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Manage Category Form</h3>
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
                                <th class="border-bottom-0">Category Name</th>
                                <th class="border-bottom-0">Image</th>
                                <th class="border-bottom-0">Description</th>
                                <th class="border-bottom-0">Status</th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td><img src="{{ asset($category->image) }}" alt="" width="40" height="60"></td>
                                    <td>{{ $category->description }}</td>
                                    <td>{{ $category->status == 1 ? 'Published' : 'UnPublished' }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('category.edit',$category->id) }}" class="btn btn-success btn-sm me-1">
                                            <i class=" fa fa-edit"></i>
                                        </a>
                                        <form method="post" action="{{ route('category.destroy', $category->id) }}">
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
