<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Item;
use App\Category;
use App\Stock;
// use App\Gallery;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::with(['category'])->get();

        return view('pages.item.index',[
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
        $categories = Category::all();
        return view('pages.item.create',[
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemRequest $request)
    {
        $data = $request->all();
        Item::create($data);
        
     
        $item = Item::where('item_no', $request->item_no)->first();
        Stock::create([
            'items_id' => $item->id,
            'qty_total' => 0
        ]);

        return redirect()->route('item.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::with(['galleries'])->where('id', $id)->firstOrFail();

        return view('pages.item.detail',[
            'item' => $item
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::findOrFail($id);
        $categories = Category::all();
        return view('pages.item.edit',[
            'item' => $item,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(ItemRequest $request, $id)
    {

        
        $data = $request->all();
        $item = Item::findOrFail($id);
        $item->update($data);

        return redirect()->route('item.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();

        return redirect()->route('item.index');
    }
}
