<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Order;
use App\OrderDetail;
use App\Stock;
use App\Http\Requests\OrderDetailRequest;

class OrderdetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderDetails = OrderDetail::with(['item','order'])->get();
        // return response()->json(['data' => $orderDetails]);
        return view('pages.order_detail.index',[
            'orderDetails' => $orderDetails
        ]);
    }

    public function order_detail($id){
        $order = Order::findOrFail($id);
        $items = Item::orderBy('description','asc')->get();
        return view('pages.order_detail.create',[
            'order' => $order,
            'items' => $items
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderDetailRequest $request)
    {
        $order_id = $request->input('orders_id');
        if(count($request->items_id) > 0){
            foreach($request->items_id as $item => $v){
                $data = [
                    'orders_id'     => $order_id,
                    'items_id'      => $request->items_id[$item],
                    'serial_number' => $request->serial_number[$item],
                    'qty'           => $request->qty[$item],
                    'is_warehouse'  => $request->is_warehouse
                ];
                // insert ke table order detail
                OrderDetail::insert($data);
                // stok update
                $stock = Stock::where('items_id',$request->items_id[$item])->first();
                $qty_total['qty_total'] = $stock['qty_total'] + $request->qty[$item];
                $stock->update($qty_total);
            }
        }
        // update status order
        $order = Order::findOrFail($order_id);
        $data['status'] = "close";
        $order->update($data);

        return redirect()->route('order-detail.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
