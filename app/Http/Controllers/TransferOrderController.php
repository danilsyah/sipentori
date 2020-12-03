<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TransferOrderRequest;
use App\TransferOrder;
use App\Location;

class TransferOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
				$transfer_orders = TransferOrder::all();
				$status = $transfer_orders[0]['status'];
				if($status == 0){
					$transfer_orders[0]['status'] = 'OPEN';
				}else{
					$transfer_orders[0]['status'] = 'CLOSE';
				}
				return view('pages.transfer_order.index',[
					'transfer_orders' => $transfer_orders
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

				//generate format code transfer
				$date = date('yymd');
				$getId = TransferOrder::getId()->count() + 1;
				$noUrut = "";
				if($getId < 10){
					$noUrut = "00".$getId;
				}else{
					$noUrut = "0".$getId;
				}
				$code = 'TO'.$date.'-'.$noUrut;


				return view('pages.transfer_order.create',[
					'locations' => $locations,
					'code'			=> $code,
				]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
