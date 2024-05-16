<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductGallary extends Model
{
    use HasFactory;

    private static $productGallaey, $productGallaries, $image, $imageNewName, $directory, $imgUrl;

    public static function saveImage($productGallary)
    {
        self::$imageNewName = 'product-gallary' . rand().'.'.$productGallary->getClientOriginalExtension();
        self::$directory = 'upload/images/product-gallary/';
        $productGallary->move(self::$directory,self::$imageNewName);
        self::$imgUrl = self::$directory.self::$imageNewName;
        return self::$imgUrl;
    }

    public static function saveProductGallary($product_gallaries, $id)
    {
        if ($product_gallaries) {
            foreach ($product_gallaries as $productGallary) {
                self::$productGallaey = new ProductGallary();
                self::$productGallaey->product_id = $id;
                self::$productGallaey->product_Gallary = self::saveImage($productGallary);
                self::$productGallaey->save();
            }
        }
    }

    public static function updateProductGallary($product_gallaries, $id)
    {
        self::$productGallaries = ProductGallary::where('product_id', $id)->get();
        foreach (self::$productGallaries as $productGallary){
            if ($productGallary->product_Gallary){
                unlink($productGallary->product_Gallary);
            }
            $productGallary->delete();
        }
        self::saveProductGallary($product_gallaries, $id);
    }
}
