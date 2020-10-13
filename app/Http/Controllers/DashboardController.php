<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Order;
use App\OrderDetail;
use App\Stock;

class DashboardController extends Controller
{
    

    public function index()
    {
       $jumlah_items = Item::all()->count('id');
       $jumlah_orders = Order::all()->count('id');
    //    $stock_items   = \DB::table('order_details')
    //             ->select('items.item_no','items.description',\DB::raw('SUM(order_details.qty) as stock_total'),'items.stok_min', 'items.unit', 'categories.name')
    //             ->join('orders', 'order_details.orders_id', '=','orders.id')
    //             ->join('items', 'order_details.items_id', '=', 'items.id')
    //             ->join('categories', 'items.categories_id', '=', 'categories.id')
    //             ->groupBy('order_details.items_id')
    //             ->orderBy('items.description','asc')
    //             ->get();
        $stocks = Stock::with(['item'])->get();
        return view('pages.dashboard',[
            'jumlah_items' => $jumlah_items,
            'jumlah_orders' => $jumlah_orders,
            'stocks'         => $stocks
        ]);
    }
}
