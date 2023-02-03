<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\Comment;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        return Product::all();
    }
    public function store(Request $request)
    {
//        $request->validate([
//            'name' => 'required',
//            'studio'=> 'required',
//            'genre'=> 'required',
//            'count'=>'required',
//            'ongoing'=>'required',
//            'rating'=>'required',
//            'release'=>'required',
//            'image'=>'required',
//            'description' => 'required',
//        ]);
        $product = new Product();
        $product->name = $request->name;
        $product->studio = $request->studio;
        $product->genre = $request->genre;
        $product->count = $request->count;
        $product->ongoing = $request->ongoing;
        $product->rating = $request->rating ;
        $product->release = $request->release ;
        $product->image = $request->image ;
        $product->description = $request->description ;
        $product->save();
        return $product;
    }
    public function show($id)
    {
        return Product::find($id);
    }

    public function update(Request $request, $id)
    {

        $product = Product::find($id);
        $product->update($request->all());
        return $product;
    }


    public function destroy($id)
    {
        return Product::destroy($id);
    }

    public function search($name)
    {
        return Product::where('name', 'like', '%' . $name . '%')->get();
    }

}
