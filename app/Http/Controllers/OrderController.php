<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Order;
use App\Location;
use App\Http\Requests\OrderRequest;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with(['location'])->get();

        return view('pages.order.index',[
            'orders' => $orders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = Location::all();
        return view('pages.order.create',[
            'locations' => $locations
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        $data = $request->all();
        if($request->file('attachment') !== null){
            $data['attachment'] = $request->file('attachment')->store('assets/attachment', 'public');
        }
        $data['status'] = 'progress';

        $order = Order::create($data);
        return redirect()->route('order.index');
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
        $order = Order::findOrFail($id);
        $locations = Location::all();
        return view('pages.order.edit',[
            'locations' => $locations,
            'order'     => $order
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OrderRequest $request, $id)
    {
        $data = $request->all();
        $order = Order::findOrFail($id);
        $order->update($data);

        return redirect()->route('order.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('order.index');
    }

    public function download_attachment($id){
        $order = Order::findOrFail($id);
        $attach = $order['attachment'];
        $formatFile = explode(".", $attach);
        var_dump($formatFile);
        $name = 'lampiran_order_'.$id.'_'.date("Y-m-d").'.'.$formatFile[1];

        return response()->download(storage_path('app/public/' . $attach), $name);
    }
}
