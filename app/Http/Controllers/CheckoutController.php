<?php

namespace App\Http\Controllers;

use App\Models\Addresses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class CheckoutController extends Controller
{
    public function checkout(){
        return view ('user.checkkout');
    }

    public function editAddres(Request $request){
         Addresses::create([
            'firstName' => $request->name,
            'lastName' => $request->last_name,
            'phone' => $request->phone,
            'addres' => $request->addres,
            'province' => $request->province,
            'city' => $request->province,
            'images' => null 
        ]);
    }
    public function showAddress(){
         $addresses = Addresses::findOrFail('user_id');
         return view('user.checkout',compact('addresses'));
    }

}
