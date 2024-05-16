<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    public static $size;

    public static function saveSize($request){
        self::$size = new Size();
        self::$size->name = $request->name;
        self::$size->code = $request->code;
        self::$size->description = $request->description;
        self::$size->status = $request->status;
        self::$size->save();
    }


    public static function updateSize($request, $id){
        self::$size = Size::find($id);
        self::$size->name = $request->name;
        self::$size->code = $request->code;
        self::$size->description = $request->description;
        self::$size->status = $request->status;
        self::$size->save();
    }
}
