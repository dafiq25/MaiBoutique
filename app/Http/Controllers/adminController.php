<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminController extends Controller
{
    public function index(){
        return view('addItem');
    }
    public function addItem(Request $request){
        $request->validate([
            'name' => 'required|min:5|max:20|unique:produk',
            'image' => 'required|image|mimes:jpg,jpeg,png',
            'desc' => 'required|min:5',
            'price' => 'required|gte:1000',
            'stock' => 'required|gte:1',
        ]);

        // dd($request->all());
        $name = $request->file('image')->store('image-product');
        DB::table('produk')->insert([
            'name' => $request->name,
            'desc' => $request->desc,
            'price' => $request->price,
            'stock' => $request->stock,
            'image_product' => $name
        ]);

        return redirect('/home');
    }

    public function deleteProduct(Request $request){
        DB::table('produk')->where('id_product', $request->id)->update([
            'status' => 0
        ]);
        return redirect('/home');
    }
}
