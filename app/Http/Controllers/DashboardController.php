<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Order;
use App\OrderDetail;

class DashboardController extends Controller
{


    public function index()
    {
       $jumlah_items = Item::all()->count('id');
       $jumlah_orders = Order::all()->count('id');
       $stocks  = \DB::table('order_details')
                ->select('items.item_no','items.description',\DB::raw('SUM(order_details.qty) as stock_total'),'items.stok_min', 'items.unit', 'categories.name as category')
                ->join('orders', 'order_details.orders_id', '=','orders.id')
                ->join('items', 'order_details.items_id', '=', 'items.id')
                ->join('categories', 'items.categories_id', '=', 'categories.id')
                ->where('order_details.is_warehouse',1)
                ->groupBy('order_details.items_id')
                ->orderBy('items.description','asc')
                ->get();

        return view('pages.dashboard',[
            'jumlah_items'  => $jumlah_items,
            'jumlah_orders' => $jumlah_orders,
            'stocks'        => $stocks
        ]);
    }
}
