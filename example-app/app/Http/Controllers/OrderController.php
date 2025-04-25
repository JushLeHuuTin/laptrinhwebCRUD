<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;

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
    public function view(Request $request)
    {
        $order_id = $request->get('id');
        $orders = Order::find($order_id);
        $data = [
            'order' => $orders,
            'products' => $orders->products,
        ];
        return view('exe.exe1.orderDetail.view', $data);
    }

}