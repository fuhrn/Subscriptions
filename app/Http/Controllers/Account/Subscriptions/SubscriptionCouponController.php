<?php

namespace App\Http\Controllers\Account\Subscriptions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriptionCouponController extends Controller
{
    public function index(Request $request)
    {
        return view('account.subscriptions.coupon');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'coupon' => 'nullable'
        ]);

        $request->user()->subscription('default')->updateStripeSubscription([
            'coupon' => $request->coupon
        ]);

        return redirect()->route('account.subscriptions');
    }
}
