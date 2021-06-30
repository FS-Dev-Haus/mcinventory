<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
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
        $items = Item::with('category')->where('org_id', auth()->user()->id)->get();

        $total = 0.0;
        foreach ($items as $item) {
            $total += ($item->price * $item->quantity);
        }

        return view('items.index', compact('items', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::where('org_id', auth()->user()->id)->pluck('name', 'id');
        
        if ($category->count() > 0) {
            return view('items.create', compact('category'));
        } else {
            return redirect()->route('items.index')->withErrors('No category created yet! You need to create one.');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'price' => 'required|numeric|max:999999.99',
            'quantity' => 'required|integer|max:1000000'
        ]);

        $result = Item::create([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'org_id' => auth()->user()->id,
            'category_id' => $request->category_id,
        ]);

        if($result){
            return redirect()->route('items.index')->with('success', 'Item Added Successfully!'); 
        } else {
            return redirect()->route('items.create')->withErrors('Item failed to be added!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return view('items.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $category = Category::where('org_id', auth()->user()->id)->pluck('name', 'id');
        return view('items.edit', compact('item', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'price' => 'required|numeric|max:999999.99',
            'quantity' => 'required|integer|max:1000000'
        ]);

        $item->update($request->all());

        return redirect()->route('items.index')->with('success', 'Item Updated Successfully!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function delete(Item $item)
    {
        $category = Category::where('org_id', auth()->user()->id)->pluck('name', 'id');
        return view('items.delete', compact('item', 'category'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('items.index')->with('success', 'Item Deleted Successfully!');
    }
}
