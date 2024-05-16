<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    public static $subCategory, $image, $imgNewName, $imgUrl, $directory;

    public static function saveSubCategory($request){
        self::$subCategory = new SubCategory();
        self::$subCategory->category_id = $request->category_id;
        self::$subCategory->name = $request->name;
        self::$subCategory->description = $request->description;
        if ($request->file('image')){
            self::$subCategory->image = self::saveImage($request);
        }
        self::$subCategory->status = $request->status;
        self::$subCategory->save();
    }

    public static function saveImage($request){
        self::$image = $request->file('image');
        self::$imgNewName = rand().'.'.self::$image->extension();
        self::$directory = 'upload/images/sub-category/';
        self::$image->move(self::$directory,self::$imgNewName);
        self::$imgUrl= self::$directory .self::$imgNewName;
        return self::$imgUrl;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public static function updateSubCategory($request, $id){
        self::$subCategory = SubCategory::find($id);
        self::$subCategory->category_id = $request->category_id;
        self::$subCategory->name = $request->name;
        self::$subCategory->description = $request->description;
        if ($request->file('image')){
            if (self::$subCategory->image){
                if (file_exists(self::$subCategory->image)){
                    unlink(self::$subCategory->image);
                }
            }
            self::$subCategory->image = self::saveImage($request);
        }
        self::$subCategory->status = $request->status;
        self::$subCategory->save();
    }

    public static function deleteSubCategory($subCategory){

        if (file_exists($subCategory->image)){
            unlink($subCategory->image);
        }
        $subCategory->delete();
    }
}
