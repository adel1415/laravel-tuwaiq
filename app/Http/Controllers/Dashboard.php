<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

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
}
