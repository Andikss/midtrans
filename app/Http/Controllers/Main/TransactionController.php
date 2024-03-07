<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseTransaction;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;
use Midtrans\Snap;

class TransactionController extends Controller
{
    public function store(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required|int'
            ]);

            $course      = Course::find($request->id);
            $transaction = CourseTransaction::create([
                'user_id'   => Auth::user()->id,
                'course_id' => $course->id,
                'is_paid'   => 0
            ]);

            Config::$serverKey    = config('midtrans.server_key');
            Config::$isProduction = false;
            Config::$isSanitized  = true;
            Config::$is3ds        = true;

            $params = array(
                'transaction_details' => array(
                    'order_id' => $transaction->id,
                    'gross_amount' => $course->price,
                ),
                'customer_details' => array(
                    'name'  => Auth::user()->username,
                    'phone' => Auth::user()->phone,
                ),
            );

            $snapToken   = Snap::getSnapToken($params);
            $transaction = CourseTransaction::with(['user', 'course'])->find($transaction->id);
            return view('pages.transaction', compact('transaction', 'snapToken'));
        } catch (Exception $error) {
            return response()->json([
                'error'   => 'Internal server error',
                'message' => 'Error while creating new transaction data : ' . $error->getMessage()
            ], 500);
        }
    }

    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed    = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'capture') {

                $transaction = CourseTransaction::find($request->order_id);
                $transaction->update(['is_paid' => true]);
            }
        }
    }
}
