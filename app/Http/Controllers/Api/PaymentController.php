<?php

namespace App\Http\Controllers\Api;

use App\Models\Payments;
use Illuminate\Http\Request;
use App\Models\PaymentDetails;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    function getpayment(Request $request)
    {
        $id = $request->query('user_id');
        $payment = Payments::where('user_id', $id);
        return $payment->get();
    }   
    function createpayment(Request $request)
    {
        
        $someArray = json_decode($request->getContent(), true);
        $id = $request->query('user_id');
        $amount = $request->query('amount');
        $payment = Payments::create([
            'user_id' => $id,
            'amount' => $amount,
        ]);
        foreach($someArray as $item) { //foreach element in $arr
            PaymentDetails::create(['quantity' => $item['quantity'],'payment_id' => $payment->id, 'product_id' => $item['id']]);
        }
        error_log($request->getContent());
       return $payment;
    }
    function cancelpayment(Request $request)
    {
        $id = $request->query('user_id');
        $payment = Payments::find($id);
        $payment->delete();

        return $payment;
    }

}
