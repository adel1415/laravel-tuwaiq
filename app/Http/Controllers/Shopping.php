<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Shopping extends Controller
{
    public function ShowListItemPhone(Request $request){
        $data = DB::table('products')
        ->join('product_details', 'products.id', '=', 'product_details.product_id')
        ->get();
        $tax = 0.15;
        foreach ($data as $key => $value) {
            $data[$key]->total = $value->price * $tax + $value->price;
            $data[$key]->tax = $tax;
            $data[$key]->descount = 10;
            $data[$key]->net = $data[$key]->total - $data[$key]->descount;
        }
        // return $data;
        return view('shopping.list-items' , compact('data'));
    }

    public function ShowDetailsPhone($id){

        $data = DB::table('products')
        ->join('product_details', 'products.id', '=', 'product_details.product_id')
        ->where('product_details.id' , $id)
        ->first();
        $tax=0.15;
        $descount = 10;
        $data->total = $data->price * $tax + $data->price;
        $data->tax = $tax;
        $data->descount = 10;
        $data->net = $data->total - $data->descount;

        return view('shopping.details' , compact('data'));
    }

    public function GetProducts(Request $request)
    {
        $category_list=['Electronics', 'Fashion', 'Home & Garden','Electronics','Beauty'];
        $query = $request->search;
        $products = productDetails::where('Productname', 'like', '%' . $query . '%')->get();
        if ($products->isEmpty()) {
            $products_details=productDetails::all();
        }else{
            $products_details=$products;
        }
        
        return view('Dashboard.products',['products_details'=>$products_details, 'category_list'=>$category_list]);
    }
}
