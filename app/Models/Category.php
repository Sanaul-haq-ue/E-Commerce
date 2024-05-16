<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public static $category, $image, $imgNewName, $imgUrl, $directory;

    public static function saveCategory($request){
        self::$category = new Category();
        self::$category->name = $request->name;
        self::$category->description = $request->description;
        if ($request->file('image')){
            self::$category->image = self::saveImage($request);
        }
        self::$category->status = $request->status;
        self::$category->save();
    }

    public static function saveImage($request){
        self::$image = $request->file('image');
        self::$imgNewName = rand().'.'.self::$image->extension();
        self::$directory = 'upload/images/category/';
        self::$image->move(self::$directory,self::$imgNewName);
        self::$imgUrl= self::$directory .self::$imgNewName;
        return self::$imgUrl;
    }

    public static function updateCategory($request, $id){
        self::$category = Category::find($id);
        self::$category->name = $request->name;
        self::$category->description = $request->description;
        if ($request->file('image')){
            if (self::$category->image){
                if (file_exists(self::$category->image)){
                    unlink(self::$category->image);
                }
            }
            self::$category->image = self::saveImage($request);
        }
        self::$category->status = $request->status;
        self::$category->save();
    }

    public static function deleteCategory($category){

        if (file_exists($category->image)){
            unlink($category->image);
        }
        $category->delete();
    }

    public function subCategory(){
        return $this->hasMany(SubCategory::class);
    }
}
