<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Models\ProductDetails;

class Dashboard extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('dashboard.index');
    }


    public function GetProducts(Request $request){
        if($request->search){
            $products = Product::where('productName', 'like', '%' . $request->search . '%')->paginate(5);
        }else{
            $products = Product::paginate(5);
        }
        return view('dashboard.products', compact('products'));
    }

    public function CreateProducts(Request $request){
        $validated = $request->validate([
            'ProductName' => 'required|max:255|string|unique:products',
        ]);
        $products = Product::create([
            'ProductName' => $request->ProductName
        ]);
        return Redirect('/dashboard/products')->with('message', 'Product Created Successfully');
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

    // public function Search(Request $request)
    // {
    //     $products = Product::where('productName', 'like', '%' . $request->search . '%')->get();
    //     return view('dashboard.products', compact('products'));
    // }

    public function GetProductsDetails(){
        $products = Product::all();
        $productsdetails = DB::table('product_details')
        ->join('products', 'product_details.product_id', '=', 'products.id')
        ->select('product_details.*', 'products.productName')
        ->get();
        return view('Dashboard.productdeltails', compact('productsdetails' , 'products'));

    }

    public function CreateProductDetails(Request $request){
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'qty' => 'required|numeric',
            'price' => 'required|numeric',
            'description' => 'required|max:255|string',
            'color' => 'required|max:255|string',
            // 'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);
        $productsdetails = ProductDetails::create([
            'product_id' => $request->product_id,
            'qty' => $request->qty,
            'description' => $request->description,
            'color' => $request->color,
            'price' => $request->price,
        ]);

        // return $request->hasfile('image');

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('images'), $imageName);
        $productsdetails->image = $imageName;
        $productsdetails->save();

        return redirect()->back()->with('message', 'Product Details Created Successfully');
    }
    public function DeleteDetails($id){
        $productsdetails = ProductDetails::find($id);
        $productsdetails->delete();
        return redirect()->back();
    }


}
