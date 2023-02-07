<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use Session;



class ProductController extends Controller
{
    //
    function index()
    {
        //$data= Product::all();
        //return view('product',['products'=>$data]);
        $data= Product::all();
        $cat = Product::select('category')->distinct()->get();
        return view('/product',['products'=>$data, 'category'=>$cat]);
        
    }
    
    function detail($id)
    {
        $data= Product::find($id);
        $cat = Product::select('category')->distinct()->get();

        return view('detail',['product'=>$data,'category'=>$cat]);
    }
    function search(Request $req)
    {
        $data= Product::
        where('name', 'like', '%'.$req->input('query').'%')->get();
        return view('search',['products'=>$data]);
    }
    function addToCart(Request $req)
    {
        if($req->session()->has('user'))
        {
            $cart= new Cart;
            $cart->user_id=$req->session()->get('user')['id'];
            $cart->Product_id=$req->product_id;
            $cart->save();
            return redirect('/');
        }
        else
        {
            return redirect('/login');
        }
    }

    function cartList()
    {
        $userId= Session::get('user')['id'];
        $products=DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id',$userId)
        ->select('products.*','cart.id as cart_id')
        ->get();

        return view('cartlist',['products'=>$products]);
    }

    function removeCart($id)
    {
        Cart::destroy($id);
        return redirect('cartlist');
    }

    function orderNow()
    {
        $userId= Session::get('user')['id'];
        $total=DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id',$userId)
        ->select('products.*','cart.id as cart_id')
        ->sum('products.price');
        //total price of product is calculated here

        return view('ordernow',['total'=>$total]);
    }

    function aboutUs()
    {
        return view('aboutus');
    }
    function contactUs()
    {
        return view('contactus');
    }
    //for admin to add products if he wish
    function addproduct(Request $req){
    $product = new Product;
    $product->name=$req->name;
    $product->price=$req->price;
    $product->category=$req->category;
    $product->description=$req->description;
    $product->gallery=$req->gallery;
    $product->save();
    return redirect('/adminaddproduct');

    }

    //for delete process of products from admin side
    function deleteproduct()
    {
        $data = Product::all();
        return view('admindeleteproduct',['products'=>$data]);
    }

    function delete2($id)
    {
        $data2 = Product::find($id);
        $data2->delete();
        return redirect('admindeleteproduct');
    }

    //for editing product
    function editData($id)
    {
        $data = Product::find($id);
        return view('admineditproduct',['data'=>$data]);
    }

    function updateproduct(Request $req)
    {
        $data = Product::find($req->id);
        $data->name=$req->name;
        $data->price=$req->price;
        $data->category=$req->category;
        $data->description=$req->description;
        $data->gallery=$req->gallery;
        $data->save();

        return redirect('admindeleteproduct');
    }

    //for categories with different pages
    //first for showing categories list , when selection categories option
   
    

    function categoryPro($cat_name){
        $data = Product::all()->where('category',$cat_name);
        $cat = Product::select('category')->distinct()->get();
        return view('/category_product',['products'=>$data, "category"=>$cat, 'heading'=>$cat_name]);
    }
    
}






