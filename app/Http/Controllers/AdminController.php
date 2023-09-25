<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\order;


class AdminController extends Controller
{
    ////    معرفة عدد المستخدمين للتطبيق
    public function Userscounts(Request $req)
    {
        $users = DB::table('users')->count();
        return response()->json([
            'status' => 'success' ,
            'users count'=> $users
        ],200);
    }
    public function profit(Request $req)
    {
        $order_price =order::all()
        ->sum('order_price');
        $profit=($order_price)*(12/100);
        $delevery=order::where('order_price_delivery',20)->sum('order_price_delivery');
        $shipping=order::where('order_price_delivery',5)->sum('order_price_delivery');
        return response()->json([
            'status' => 'success' ,
            'salles'=> $order_price,
            'delivery'=> $delevery,
            'shipping'=> $shipping,
            'profit'=> $profit
        ],200);
    }
    
}
