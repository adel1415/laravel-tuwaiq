<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Shopping extends Controller
{
    public function ShowListItemPhone(Request $request){
        return view('shopping.list-items');
    }
}
