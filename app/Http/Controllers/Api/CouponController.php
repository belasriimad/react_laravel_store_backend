<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CouponController extends Controller
{
    /**
     * Apply coupon
     */
    public function applyCoupon(Request $request)
    {
        $coupon = Coupon::whereName($request->name)
                        ->where('validity', '>=', Carbon::now()
                        ->format('Y-m-d h:i:s'))
                        ->first();
        if($coupon) {
            return response()->json([
                'success' => true,
                'message' => 'Coupon applied successfully',
                'coupon' => $coupon
            ]);
        }else {
            return response()->json([
                'success' => false,
                'message' => 'Invalid or expired coupon!',
            ]);
        }
    }
}
