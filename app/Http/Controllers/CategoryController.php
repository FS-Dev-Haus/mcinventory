<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::withCount('items')->where('org_id', auth()->user()->id)->get();
        // dd($categories);
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
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
            'name' => 'required|string|max:255'
        ]);

        $result = Category::create([
            'name' => $request->name,
            'org_id' => auth()->user()->id
        ]);

        if ($result) {
            return redirect()->route('categories.index')->with('success', 'New Category Added Successfully!');
        } else {
            return redirect()->route('categories.create')->withErrors('New Category Failed to be Added');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $result = $category->update($request->all());

        if ($result) {
            return redirect()->route('categories.index')->with('success', 'Category Updated Successfully!');
        } else {
            return redirect()->route('categories.edit', compact('category'))->withErrors('New Category Failed to be Updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function delete(Category $category)
    {
        $count = Category::withCount('items')->where('id', $category->id)->first();
        if ($count->items_count > 0) {
            return redirect()->route('categories.index')->withErrors('Delete not allowed! There is/are item(s) under the categories.');
        } else {
            return view('categories.delete', compact('category'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category Deleted Successfully!');
    }
}
