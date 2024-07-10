<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function vnpayPayment()
    {
        // Xử lý logic thanh toán VNPAY ở đây

        // Redirect đến trang thanh toán của VNPAY
        return redirect()->away('https://sandbox.vnpayment.vn/paymentv2/vpcpay.html');
    }
}