<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\PaymentMethod;

class APIPaymentController extends Controller
{
    public function index()
    {
        // Lấy danh sách các thanh toán và bao gồm cả thông tin về phương thức thanh toán
        $payments = Payment::with('paymentMethod')->get();
        
        // Chỉ lấy ra các trường cần thiết từ paymentMethod
        $formattedPayments = $payments->map(function ($payment) {
            return [
                'id' => $payment->id,
                'order_payments_id' => $payment->order_payments_id,
                'payment_methods_id' => $payment->paymentMethod->id,
                'payment_method_name' => $payment->paymentMethod->name,
                'date_payments' => $payment->date_payments,
                'created_at' => $payment->created_at,
                'updated_at' => $payment->updated_at,
            ];
        });

        return response()->json($formattedPayments);
    }
    public function paymentMethods()
    {
        $paymentMethods = PaymentMethod::all();
        return response()->json($paymentMethods);
    }
}

