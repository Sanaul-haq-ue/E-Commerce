<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    private static $customer, $image, $directory, $imageName, $extension, $imageUrl;

    use HasFactory;

    public static function newCustomer($request)
    {
        self::$customer = new Customer();
        self::$customer->name = $request->name;
        self::$customer->email = $request->email;
        self::$customer->phoneNumber = $request->phoneNumber;
        if($request->password)
        {
            self::$customer->password = bcrypt($request->password);
        }
        else
        {
            self::$customer->password = bcrypt($request->phoneNumber);
        }
        self::$customer->save();

        return self::$customer;
    }
}
