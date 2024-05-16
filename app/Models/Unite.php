<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unite extends Model
{
    use HasFactory;

    public static $unite;

    public static function saveUnite($request){
        self::$unite = new Unite();
        self::$unite->name = $request->name;
        self::$unite->code = $request->code;
        self::$unite->description = $request->description;
        self::$unite->status = $request->status;
        self::$unite->save();
    }


    public static function updateUnite($request, $id){
        self::$unite = Unite::find($id);
        self::$unite->name = $request->name;
        self::$unite->code = $request->code;
        self::$unite->description = $request->description;
        self::$unite->status = $request->status;
        self::$unite->save();
    }


}
