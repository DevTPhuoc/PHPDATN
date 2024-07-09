<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartsDetail;
use App\Models\OrderDetail;
use App\Models\Order;


class APIOrderController extends Controller
{
     public function createOrder(Request $req) 
    {
    $cartDetail = CartsDetail::where('user_id', $req->id)->get();
    $orders = new Order();
    $orders ->fullname = $req->fullname;
    $orders ->phone = $req->phone;
    $orders ->shippingAddress = $req->shippingAddress;
    $orders->order_code = round(microtime(true)*1000 );
    $orders->user_order_id = $req->id;
    $orders->shipping_status_id= 1;
    $orders->order_date=date('Y-m-d H:i:s');
    $totalPrice=0;
    foreach ( $cartDetail  as $item){
        $totalPrice += $item->price* $item->quantity;
    }
    $orders->totalPrice = $totalPrice;

    

    $orders->save();
    $ordersId=$orders->id;
    foreach ( $cartDetail as $item){
   $ordersdetail = new OrderDetail();
   $ordersdetail->order_id=  $ordersId;
   $ordersdetail->product_order_detail_id = $item->product_id;
   $ordersdetail->quantity= $item->quantity;
      $ordersdetail->price= $item->price;

   $ordersdetail->total= $item->quantity * $item->price  ;
   $ordersdetail->save();
    }
    // $cartDetail->delete();
    return response()->json([
        'success' => true,
        'msg' => 'tạo hóa đơn thành công',
    ]);
    $cartDetail->delete();

 
    }
    public function deleteCart($userId)
    {
        CartsDetail::where('user_id', $userId)->delete();
    }
}
