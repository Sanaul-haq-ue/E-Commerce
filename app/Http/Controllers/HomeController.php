<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('website.home.index',[
            'products' => Product::where('featured_status',1)->orderBy('id','dese')->take(5),
        ]);
    }

    public function category(){
        return view('website.category.index');
    }

    public function product(){
        return view('website.product.index');
    }
}
