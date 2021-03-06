<?php

namespace App\Http\Controllers\Api;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    function getpayment(Request $request)
    {
        $id = $request->query('user_id');
        $payment = Payment::where('user_id', $id);
        return $payment->get();
    }   
    function createpayment(Request $request)
    {
        $id = $request->query('user_id');
        $amount = $request->query('amount');
        $payment = Payment::create([
            'user_id' => $id,
            'payment' => $amount,
        ]);
       return $payment;
    }
    function cancelpayment(Request $request)
    {
        $id = $request->query('user_id');
        $payment = Payment::find($id);
        $payment->delete();

        return $payment;
    }
}
