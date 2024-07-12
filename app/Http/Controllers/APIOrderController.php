<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartsDetail;
use App\Models\OrderDetail;
use App\Models\Order;
use Illuminate\Support\Facades\DB;



class APIOrderController extends Controller
{
     public function createOrder(Request $req) 
    {
        DB::beginTransaction(  );
        try {
            $cartDetail = CartsDetail::where('user_id', $req->user_id)->get();
    $orders = new Order();
    $orders ->fullname = $req->fullname;
    $orders ->phone = $req->phone;
    $orders ->user_order_id = $req->user_id;

    $orders ->shippingAddress = $req->shippingAddress;
    $orders->order_code = round(microtime(true)*1000 );
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
    CartsDetail::where('user_id', $req->user_id)->delete();  
            DB::commit();
            return response()->json([
                'success' => true,
                'msg' => 'tạo hóa đơn thành công',
            ]);

        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json([
                'success' => true,
                'msg' => 'tạo hóa đơn l',
            ]);
        }
    

    // $cartDetail->delete();
   

 
    }
    public function getOrder($id)
    {
        $orders = Order::where('user_order_id', $id)->get();

        if ($orders->isEmpty()) {
            return response()->json(['message' => 'No orders found for this user'], 404);
        }

        return response()->json($orders, 200);
    }
    
    public function deleteCart($userId)
    {
        CartsDetail::where('user_id', $userId)->delete();
    }
}
