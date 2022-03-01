<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        return view('BackEnd.Coupon.add');
    }

    public function code_save(Request $request)
    {
        $coupon  = new Coupon();
        $coupon->coupon_code = $request->coupon_code;
        $coupon->coupon_type = $request->coupon_type;
        $coupon->coupon_value = $request->coupon_value;
        $coupon->cart_min_value = $request->cart_min_value;
        $coupon->expired_on = $request->expired_on;
        $coupon->coupon_status = $request->coupon_status;
        $coupon->added_on = $request->added_on;

        $coupon->save();

        return back()->with('sms','Coupon Saved');
    }

    public function code_manage()
    {
        $coupons= Coupon::all();

        return view('BackEnd.Coupon.manage',compact('coupons'));
    }

    public function code_delete($coupon_id)
    {
        $coupon = Coupon::find($coupon_id);

        $coupon->delete();
        return back()->with('sms','Coupon Code Deleted');
    }
    public function code_active($coupon_id)
    {
        $coupon = Coupon::find($coupon_id);
        $coupon->coupon_status=1;
        $coupon->save();
        return back();
    }
    public function code_inactive($coupon_id)
    {
        $coupon = Coupon::find($coupon_id);
        $coupon->coupon_status=0;
        $coupon->save();
        return back();
    }
}
