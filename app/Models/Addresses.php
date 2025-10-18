<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Addresses extends Model
{
    protected $fillable=[
        'user_id',
        'first_name',
        'last_name',
        'phone',
        'address',
        'province',
        'city',
        'postal_code'
    ];

    public function show(){
        $address=Addresses::findFail('$id');
        return view('user.checkout',compact('addresses'));
    }
}
