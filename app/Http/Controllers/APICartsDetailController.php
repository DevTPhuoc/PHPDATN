<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Products;
use App\Models\CartsDetail;


use Illuminate\Http\Request;

class APICartsDetailController extends Controller
{
   
        public function getCartByIdCustomer($id) {
            $carts = CartsDetail::where('user_id', $id)->get();
    
            return response()->json([
                'success' => true,
                'data' => $carts
            ]);
    
}
public function addCart(Request $req) 
{
    
    // Validate the incoming request
    
    $validatedData = $req->validate([
        'product_id' => 'required|integer',
        'user_id' => 'required|integer',
        'price' => 'required|numeric',
        'quantity' => 'required|integer'
    ]);
   

    // Check if the product is already in the cart for the user
    $check = CartsDetail::where('product_id', $req->product_id)
                        ->where('user_id', $req->user_id)
                        ->first();

    if ($check) {
        return response()->json([
            'success' => false,
            'msg' => 'Product already exists in the cart'
        ]);
    }

    // Create a new cart detail entry
    $carts = new CartsDetail();
    $carts->user_id = $req->user_id;




    $carts->price = $req->price ?? 0;
    $carts->product_id = $req->product_id;
    $carts->quantity = $req->quantity;

    try {
        $carts->save();

        return response()->json([
            'success' => true,
            'msg' => 'Product added to cart successfully'
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'msg' => 'Failed to add product to cart',
            'error' => $e->getMessage()
        ], 500);
    }
    
}

public function delCart(Request $req) {

    $carts = CartsDetail::find($req->id);
    if(empty($cart)) {
        return response()->json([
            'success' => false,
            'msg' => 'khong ton tai'
        ]); 
    }

    $carts->delete();

    return response()->json([
        'success' => true,
        'msg' => 'xoa thanh cong'
    ]); 
}

}
