<?php

namespace App\Http\Controllers;
//use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display products and filter them by categories
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        // Filter by Categories
        if (isset($_GET['query'])) {
            $search_text = ($_GET['query']);
            $products = Product::where('category_id', 'Like', '%' . $search_text . '%')->get();
            $categories = Category::all();
        } else {
            $products = Product::all();
            $categories = Category::all();
        }

        // Sort by price....
        // still working on it
        /*
        if (isset($_GET['sort']) == 'price_asc') {
            $products = Product::orderBy('price', 'asc')->get();
        } else  if (isset($_GET['sort']) == 'price_desc') {
            $products = Product::orderBy('price', 'desc')->get();
        }
*/

        return view('product', [
            'categories' => $categories,
            'products' => $products,
            'layout' => 'index',
        ]);
    }



    /**
     * Show the form for creating a new Product.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('product', [
            'categories' => $categories,
            'products' => $products,
            'layout' => 'create',
        ]);
    }

    /**
     * Store a newly created Product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->image = $request->input('image');
        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('uploads/products/', $filename);
            $product->image = $filename;
        } else {
            return $request;
            $product->image = '';
        }
        $product->category_id = $request->input('category_id');
        $product->save();
        return redirect('/');
    }




    /**
     * Show the form for editing the Product.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::find($id);
        $products = Product::all();
        return view('product', [
            'categories' => $categories,
            'products' => $products,
            'product' => $product,
            'layout' => 'edit',
        ]);
    }

    /**
     * Update the specified Product.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('uploads/products/', $filename);
            $product->image = $filename;
        } else {
            return $request;
            $product->image = '';
        }
        $product->category_id = $request->input('category_id');

        $product->save();
        return redirect('/');
    }

    /**
     * Remove the specified Product from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('/');
    }


    /**
     * Search Product By Name
     */
    public function search()
    {
        $categories = Category::all();

        $search_text = $_GET['query'];
        $products = Product::where('name', 'LIKE', '%' . $search_text . '%')->with('category')->get();

        return view('product', [
            'categories' => $categories,
            'products' => $products,
            'layout' => 'search',
        ]);
    }
}
