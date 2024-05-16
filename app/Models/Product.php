<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    private static $product, $image, $imageNewName, $directory, $imgUrl;

    public static function saveImage($request){
        self::$image = $request->file('image');
        self::$imageNewName = 'product' . rand().'.'.self::$image->getClientOriginalExtension();
        self::$directory = 'upload/images/product/';
        self::$image->move(self::$directory,self::$imageNewName);
        self::$imgUrl = self::$directory.self::$imageNewName;
        return self::$imgUrl;
    }

    public static function saveProduct($request){
        self::$product = new Product();
        self::$product->category_id = $request->category_id;
        self::$product->sub_category_id = $request->sub_category_id;
        self::$product->brand_id = $request->brand_id;
        self::$product->unite_id = $request->unite_id;

        if ($request->file('image'))
        {
            self::$product->image = self::saveImage($request);
        }
        else{
            $defaultImagePath = 'upload/images/defaultImage.jpg';
            self::$product->image = $defaultImagePath;
        }

        self::$product->name = $request->name;
        self::$product->code = $request->code;
        self::$product->short_description = $request->short_description;
        self::$product->long_description = $request->long_description;
        self::$product->regular_price = $request->regular_price;
        self::$product->selling_price = $request->selling_price;
        self::$product->stock_amount = $request->stock_amount;
        self::$product->status = $request->status;
        self::$product->save();
        return self::$product;

    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
    public function subCategory() {
        return $this->belongsTo(SubCategory::class);
    }
    public function brand() {
        return $this->belongsTo(Brand::class);
    }
    public function unite() {
        return $this->belongsTo(Unite::class);
    }
    public function colors() {
        return $this->hasMany(ProductColor::class);
    }
    public function sizes() {
        return $this->hasMany(ProductSize::class);
    }
    public function productGallaries() {
        return $this->hasMany(ProductGallary::class);
    }


    public static function updateProduct($request, $product){
        self::$product = Product::find($product);
        $product->category_id = $request->category_id;
        $product->sub_category_id = $request->sub_category_id;
        $product->brand_id = $request->brand_id;
        $product->unite_id = $request->unite_id;

        if ($request->file('image'))
        {
            if (file_exists($product->image)){
                unlink($product->image);
            }
            $product->image = self::saveImage($request);
        }
        else{
            self::$imgUrl = $product->image;
        }

        $product->name = $request->name;
        $product->code = $request->code;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->regular_price = $request->regular_price;
        $product->selling_price = $request->selling_price;
        $product->stock_amount = $request->stock_amount;
        $product->status = $request->status;
        $product->save();
    }




}



