<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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
        // return $data;

        return view('shopping.details' , compact('data'));
    }

    
    public function Add_to_cart(Request $request , $id){
        $userid = $request->user()->id;
        $data= DB::table('products')
        ->join('product_details', 'products.id', '=', 'product_details.product_id')
        ->where('product_details.id' , $id)
        ->first();
        $tax=0.15;
        $descount = 10;
        $data->total = $data->price * $tax + $data->price;
        $data->tax = $tax;
        $data->descount = 10;
        $data->net = $data->total - $data->descount;

        $row = [
            'product_id'=>$data->id,
            'price'=>$data->price,
            'qty'=>$data->qty,
            'tax'=>$data->tax,
            'total'=>$data->total,
            'discount'=>$data->descount,
            'user_id'=>$userid,
            'Net'=>$data->net,
        ];

        DB::table('carts')->insert($row);
        $count = DB::table('carts')->where('user_id' , $userid)->count();
        Session::put('count' , $count);
        return redirect()->back()->with('message', 'Product Added To Cart');

    }

}
