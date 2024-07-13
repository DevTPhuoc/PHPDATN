<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartsDetail;
use App\Models\OrderDetail;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;



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

    
    public function cancelOrder($id)
    {
        // Attempt to find the order by order ID
        $order = Order::findOrFail($id); // Assuming 'Order' is your Eloquent model for orders
    
        // Check if the order is already in delivery
        if ($order->role === '2') {
            return response()->json(['status' => 'error', 'message' => 'Order is already in delivery and cannot be cancelled']);
        }
    
        // Calculate the time difference between order creation and current time
        $createdAt = Carbon::parse($order->created_at);
        $now = Carbon::now();
        $minutesDifference = $now->diffInMinutes($createdAt);
    
        // Check if more than 30 minutes have passed since the order creation
        // if ($minutesDifference > 30) {
        //     return response()->json(['status' => 'error', 'message' => 'Order cannot be cancelled after 30 minutes']);
        // }
    
        // Update order status (role) to '-1' (or another appropriate status)
        $order->role = '-1';
        $order->save();
    
        // Return success response
        return response()->json(['status' => 'success', 'message' => 'Order cancelled successfully']);
    }
    

    public function deleteCart($userId)
    {
        CartsDetail::where('user_id', $userId)->delete();
    }
}
