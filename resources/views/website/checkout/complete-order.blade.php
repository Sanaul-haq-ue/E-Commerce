@extends('website.master')

@section('title')
    Ecommerce Website - Product Details Page
@endsection

@section('body')

<main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index-2.html" rel="nofollow">Home</a>
                    <span></span> Checkout
                    <span></span> Complete Order
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">

        <p class="text-center">{{session('message')}}</p>

        </section>

</main>

@endsection