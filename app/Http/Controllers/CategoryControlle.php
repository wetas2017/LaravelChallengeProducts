<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryControlle extends Controller
{
    /**
     * Display Categories
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories', [
            'categories' => $categories,
            'layout' => 'index',
        ]);
    }

    /**
     * Show the form for creating a new Category.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('categories', [
            'categories' => $categories,
            'layout' => 'create',
        ]);
    }

    /**
     * Store a newly created Category in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->input('name');
        $category->parent_category = $request->input('parent');
        $category->save();
        return redirect('/category');
    }

    /**
     * Show the form for editing the Category.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $category = Category::find($id);

        return view('categories', [
            'categories' => $categories,
            'category' => $category,
            'layout' => 'edit',
        ]);
    }

    /**
     * Update the specified Category.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->parent_category = $request->input('parent');
        $category->save();
        return redirect('/category');
    }

    /**
     * Remove the specified Category from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect('/category/');
    }
}
