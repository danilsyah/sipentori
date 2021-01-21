<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\JournalDetailRequest;
use App\JournalDetail;
use App\Item;
use App\Stock;
use App\Journal;
use App\OrderDetail;

class JournaldetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JournalDetailRequest $request)
    {
       $data = $request->all();
       JournalDetail::create($data);

    //    update status lokasi barang
        $order_detail = \DB::table('order_details')->where('serial_number', $request->get('serial_number'))->update(['is_warehouse' => 0]);

       return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$journal_details = JournalDetail::with(['item'])->where('journals_id',$id)->get();
        $journal = Journal::findOrFail($id);
        $item_orders = \DB::table('order_details')
                    ->select('items.id','items.item_no','items.description',\DB::raw('SUM(order_details.qty) as stock_total'))
                    ->join('items', 'order_details.items_id','=','items.id')
                    ->where('order_details.is_warehouse',1)
                    ->groupBy('order_details.items_id')
                    ->get();
        return view('pages.journal_detail.create',[
            'journal'           => $journal,
			'journal_details'   => $journal_details,
            'item_orders'       => $item_orders
        ]);
    }

    public function showSerialNumber($id)
    {
        $order_detail = OrderDetail::where('items_id','=', $id)->where('is_warehouse','1')->pluck('serial_number', 'serial_number');
        return response()->json($order_detail);
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
