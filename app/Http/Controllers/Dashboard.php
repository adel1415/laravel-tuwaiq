<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class Dashboard extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('dashboard.index');
    }


    public function GetProducts(){
        $products = Product::all();
        return view('dashboard.products', compact('products'));
    }

    public function CreateProducts(Request $request){
        $products = Product::create([
            'ProductName' => $request->ProductName
        ]);
        return Redirect('/dashboard/products');
    }

    public function Del($id){
        $products = Product::find($id);
        $products->delete();
        return Redirect('/dashboard/products');
    }

    public function Edit(Request $request){
        $products = Product::find($request->productId);
        $products->productName = $request->productName;
        $products->save();
        return Redirect('/dashboard/products');
    }

    public function Search(Request $request)
    {
        $products = Product::where('productName', 'like', '%' . $request->search . '%')->get();
        return view('dashboard.products', compact('products'));
    }

    public function test(){
        // $data = DB::select('SELECT * FROM products');
                // $data = DB::table('products')->orderBy('id', 'desc')->get();
                $data = DB::table('products')
                ->join('product_details', 'products.id' , '=', 'products.id')
                ->get();
                return $data;
    }
}
