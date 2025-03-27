<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        $orders = DB::table('users')
            ->join('orders', 'users.user_id', '=', 'orders.user_id')
            ->select('users.user_id', 'users.user_name', 'orders.order_id')
            ->get();

        return view('exe.exe2.orders', ['orders' => $orders]);
    }
}