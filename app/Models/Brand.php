<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    public static $brand, $image, $imgNewName, $imgUrl, $directory;

    public static function saveBrand($request){
        self::$brand = new Brand();
        self::$brand->name = $request->name;
        self::$brand->description = $request->description;
        if ($request->file('image')){
            self::$brand->image = self::saveImage($request);
        }
        self::$brand->status = $request->status;
        self::$brand->save();
    }

    public static function saveImage($request){
        self::$image = $request->file('image');
        self::$imgNewName = rand().'.'.self::$image->extension();
        self::$directory = 'upload/images/brand/';
        self::$image->move(self::$directory,self::$imgNewName);
        self::$imgUrl= self::$directory .self::$imgNewName;
        return self::$imgUrl;
    }


    public static function updateBrand($request, $id){
        self::$brand = Brand::find($id);
        self::$brand->name = $request->name;
        self::$brand->description = $request->description;
        if ($request->file('image')){
            if (self::$brand->image){
                if (file_exists(self::$brand->image)){
                    unlink(self::$brand->image);
                }
            }
            self::$brand->image = self::saveImage($request);
        }
        self::$brand->status = $request->status;
        self::$brand->save();
    }

    public static function deleteBrand($brand){

        if (file_exists($brand->image)){
            unlink($brand->image);
        }
        $brand->delete();
    }
}
