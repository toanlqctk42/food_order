<?php

namespace App\Http\Controllers;

use App\Models\Delivery_boy;
use Illuminate\Http\Request;

class deliveryBoyController extends Controller
{
    public function index()
    {
        return view('BackEnd.deliveryBoy.add');
    }

    public function save_boy(Request $request)
    {
        $boy= new Delivery_boy();
        $boy->delivery_boy_name = $request->delivery_boy_name;
        $boy->delivery_boy_phone_number = $request->delivery_boy_phone_number;
        $boy->delivery_boy_password = $request->delivery_boy_password;
        $boy->delivery_boy_status = $request->delivery_boy_status;
        $boy->added_on = $request->added_on;

        $boy->save();
        return back()->with('sms','Boy_saved');
    }
}
