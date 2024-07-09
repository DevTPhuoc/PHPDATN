<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;


use Illuminate\Http\Request;

class APIUserController extends Controller
{
      public function getUser()
     {
        $User = Auth::user();
    
         // Kiểm tra xem $Admin có null hay không
         $User = User::all();
    
        return response()->json(['users' => $User]);
     }
    public function Login(Request  $request){


        $validated = $request->validate([
            'account_name' => 'required|string',
            'password' => 'required|string',
        ]);
        $user = User::where('account_name', $validated['account_name'])->first();
        if(!$user ){
            return response()->json([
                'message'=>'no user with email'
            ], 401);
        }
        if( Hash::check($validated['password'], $user->password))
        {
            return response()->json([ 
                'success'=>true, 
                'data'=>$user
            ]);         
        }
        return response()->json([
            'message'=>'Invalid credentials'
        ], 401);
        }
        public function register(Request $request)
    {
        $request = request(['account_name','password']);
        $user = new User();
        $user->account_name = $request['account_name'];
        
       
    
        $user->password = $request['password'];
  
        $user->save();
        return response()->json(['message'=>'Register successful']);
    }
}
     

        

       
//          $Admin = Admin::where('ten_dang_nhap', $email)->first();
//          if($Admin==null){

//               return response()->json(['error'=>'Unable to find user']);

//          }
//          if($Admin->password==$password)
//          {

//             return response()->json(['admin' => $Admin]);
//          }
//          else{
//             return response()->json(['error'=>'Unable to find user']);
//          }
        
       



    
//     public function Register(){
//         $request = request(['ten_dang_nhap','password']);
//         $Admin = new Admin();
//         $Admin->ten_dang_nhap = $request['ten_dang_nhap'];
        
       
    
//         $Admin->password = $request['password'];
  
//         $Admin->save();
//         return response()->json(['message'=>'Register successful']);
//     }
//     public function Edit(){
//         $request = request(['id','ten_dang_nhap','password']);
//         $keys = array_keys($request);
//         $values = array_values($request);
//         $Admin = Admin::where('id',$request['id'])->first();
//         if ($Admin) {
//             if($keys[1] == 'password')
//             {
//                 if (password_verify($values[2], $Admin->password))
//                     if($values[2] == $values[1])
//                         return response()->json(['message'=>'New password is the same as current password']);
//                     else
//                         $Admin->{$keys[1]} = Hash::make($values[1]);
//                 else
//                     return response()->json(['message'=>'Current password is not correct']);
//             }
//             else
//             {
//                 if($values[1] == $Admin->{$keys[1]})
//                     return response()->json(['message'=>'New '.$keys[1].' is the same as current '.$keys[1]]);
//                 $Admin->{$keys[1]} = $values[1];
//             }
//             $Admin->save();
//         }else{
//             return response()->json(['error'=>'Unable to find user']);
//         }
//         return response()->json(['message'=>'Edited '.$keys[1]]);
//     }


    
//     public function getAdmin()
// {
//     $Admin = Auth::user();

//     // Kiểm tra xem $Admin có null hay không
//     $admins = Admin::all();

//     return response()->json(['admins' => $admins]);
// }
    
//     public function login( Request  $request)
//     {
//         //  $request = request(['ten_dang_nhap','password']);
//         $email = $request->input('ten_dang_nhap');
//         $password =$request->input('password');
        


        

       
//          $Admin = Admin::where('ten_dang_nhap', $email)->first();
//          if($Admin==null){

//               return response()->json(['error'=>'Unable to find user']);

//          }
//          if($Admin->password==$password)
//          {

//             return response()->json(['admin' => $Admin]);
//          }
//          else{
//             return response()->json(['error'=>'Unable to find user']);
//          }
        
       

//     }
//     public function logout()
//     {
//         auth('api')->logout();

//         return response()->json(['message' => 'Successfully logged out']);
//     }

