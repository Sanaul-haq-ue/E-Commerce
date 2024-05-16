<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductGallary;
use App\Models\ProductSize;
use App\Models\Size;
use App\Models\SubCategory;
use App\Models\Unite;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $subCategories, $product;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.product.manage-product',[
            'products' => Product::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.create-product',[
            'categories' => Category::where('status',1)->get(),
            'sub_categories' => SubCategory::where('status',1)->get(),
            'brands' => Brand::where('status',1)->get(),
            'unites' => Unite::where('status',1)->get(),
            'colors' => Color::where('status',1)->get(),
            'sizes' => Size::where('status',1)->get(),

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->product = Product::saveProduct($request);
        ProductColor::saveProductColor($request->colors, $this->product->id);
        ProductSize::saveProductSize($request->sizes, $this->product->id);
        ProductGallary::saveProductGallary($request->product_gallaries, $this->product->id);
        return back()->with('messages', 'Product save successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.product.show-product',[
            'product' => $product,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit-product',[
            'product' => $product,
            'categories' => Category::where('status',1)->get(),
            'sub_categories' => SubCategory::where('status',1)->get(),
            'brands' => Brand::where('status',1)->get(),
            'unites' => Unite::where('status',1)->get(),
            'colors' => Color::where('status',1)->get(),
            'sizes' => Size::where('status',1)->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        Product::updateProduct($request, $product);
        ProductColor::updateProductColor($request->colors, $product->id);
        if ($request->product_gallaries){
            ProductGallary::updateProductGallary($request->product_gallaries, $product->id);
        }
        ProductSize::updateProductSize($request->sizes, $product->id);
        return redirect()->route('product.index')->with('messages', 'Product update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }


    public function getSubCategoryByCategory()
    {
        $this->subCategories = SubCategory::where('category_id', $_GET['id'])->where('status',1)->get();
        return response()->json($this->subCategories);
    }
}
