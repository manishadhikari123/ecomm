<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Session;

class CollaborativeFiltering
{
    public $countOfResult = 10;

    function getRecommendations($dataset, $userId)
    {
        $recommendedProducts = [];

        $correlationScores = [];

        $maxLength = max(array_map('count', $dataset));

    foreach ($dataset as $otherUserId => $products) {
            
            if ($otherUserId == $userId) {
                continue;
            }

            if (count($products) < $maxLength) {
                $products = array_pad($products, $maxLength, 0);
            }
    $correlationScores[$otherUserId] = $this->calculatePearsonCorrelation($dataset[$userId], $products);
        }

        arsort($correlationScores);

        $numSimilarUsers = min(count($correlationScores), $this->countOfResult);
        $similarUserIds = array_keys(array_slice($correlationScores, 0, $numSimilarUsers));
        foreach ($similarUserIds as $similarUserId) {
            if (array_key_exists($similarUserId, $dataset)) {
                $recommendedProducts = array_merge($recommendedProducts, array_diff($dataset[$similarUserId], $dataset[$userId]));
            }
        }

        $recommendedProducts = array_unique($recommendedProducts);

        return $recommendedProducts;
    }

    public function calculatePearsonCorrelation($vector1, $vector2)
    {
        $mean1 = array_sum($vector1) / count($vector1);
        $mean2 = array_sum($vector2) / count($vector2);

        $numerator = 0;
        $denominator1 = 0;
        $denominator2 = 0;
        for ($i = 0; $i < count($vector1); $i++) {
            $numerator += ($vector1[$i] - $mean1) * ($vector2[$i] - $mean2);
            $denominator1 += ($vector1[$i] - $mean1) * ($vector1[$i] - $mean1);
            $denominator2 += ($vector2[$i] - $mean2) * ($vector2[$i] - $mean2);
        }

        $denominator = sqrt($denominator1 * $denominator2);
        $pearsonCorrelation = $numerator / $denominator;

        return $pearsonCorrelation;
    }
}

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
        $datas= Product::find($id);
        $cat = Product::select('category')->distinct()->get();
        // product_id, user_id
        $recommendationData = Order::select('product_id', 'user_id')->distinct()->get();



        $dset = [];

        foreach ($recommendationData as $data) {
            if(!isset($dset[$data["user_id"]])) {
                $dset[$data["user_id"]] = [$data["product_id"]];
            } else {
                array_push($dset[$data["user_id"]] , $data["product_id"]);
            }
    
        }

        // Create a new instance of the CollaborativeFiltering class
        $cf = new CollaborativeFiltering();

        // Call the getRecommendations method for user ID 1
        $recommendedProducts = $cf->getRecommendations($dset, 1);

        // <!-- print_r($recommendedProducts); -->
        // Print the recommended products
        $sugIds = [];
        foreach ($recommendedProducts as $index => $value) {
            //echo "$value";
            array_push($sugIds, $value);
        }


        $recommendationDataList = Product::select()->whereIn("id", $sugIds)->get();





        return view('detail',['product'=>$datas,'category'=>$cat,'recommendationDataList'=>$recommendationDataList]);
    }

    function search(Request $req)
    {
        $query = $req->input('query');
        
        if(empty($query)) {
            return view('search', ['products' => []]);
        }
        
        $data = Product::where('name', 'like', '%'.$query.'%')->get();
        return view('search', ['products' => $data]);
    }


//for searching
    //function search(Request $req)
    //{
      //  $data= Product:: where('name', 'like', '%'.$req->input('query').'%')->get();
        //return view('search',['products'=>$data]);
    //}



    // function addToCart(Request $req)
    // {
    //     if($req->session()->has('user'))
    //     {
    //         $cart= new Cart;
    //         $cart->user_id=$req->session()->get('user')['id'];
    //         if($cart->product_id == $req->product_id )
    //         {
    //             $cart->product_id=$req->product_id;
    //             $cart->prod_quantity += $req->prod_quantity;
    //         }
    //         else{
    //             $cart->product_id=$req->product_id;
    //             $cart->prod_quantity=$req->prod_quantity;
    //         }
    //         $cart->prod_quantity=$req->prod_quantity;
    //         $cart->save();
    //         return redirect('/');
    //     }
//     function addToCart(Request $req)
// {
//     if ($req->session()->has('user')) {
//         $user_id = $req->session()->get('user')['id'];
//         $product_id = $req->product_id;
//         $cart = Cart::where('user_id', $user_id)
//                     ->where('product_id', $product_id)
//                     ->first();

//         if ($cart) {
//             // If cart exists, update the quantity
//             $cart->prod_quantity += $req->prod_quantity;
//         } else {
//             // If cart doesn't exist, create a new one
//             $cart = new Cart();
//             $cart->user_id = $user_id;
//             $cart->product_id = $product_id;
//             $cart->prod_quantity = $req->prod_quantity;
//         }
        
//         $cart->save();
//         // Decrease the product quantity in the products table
//         $product = Product::find($req->product_id);
//         $product->quantity -=$req->prod_quantity;
//         $product->save();

//         return redirect('/');
    // }
    function addToCart(Request $req)
{
    if($req->session()->has('user'))
    {
        $product = Product::find($req->product_id);
        if($product->quantity >= $req->prod_quantity){
            $cart = Cart::where('user_id',$req->session()->get('user')['id'])->where('product_id',$req->product_id)->first();
            if($cart){
                $cart->prod_quantity += $req->prod_quantity;
                $cart->update();
            }else{
                $cart = new Cart;
                $cart->user_id=$req->session()->get('user')['id'];
                $cart->product_id=$req->product_id;
                $cart->prod_quantity = $req->prod_quantity;
                $cart->save();
            }
            $product->quantity -= $req->prod_quantity;
            $product->save();
            return redirect('cartlist');
            return redirect()->back()->with('success', 'Product added to cart successfully.');

        } else {
            return redirect()->back()->with('error', 'Requested quantity is more than available quantity');

        }
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
        ->select('products.*','cart.id as cart_id','prod_quantity')
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
        // ->sum('products.price');
        ->sum(DB::raw('products.price * cart.prod_quantity'));
        //total price of product is calculated here

        return view('ordernow',['total'=>$total]);
    }

    function orderPlace(Request $req)
    {
        $userId= Session::get('user')['id'];
        $allCart=Cart::where('user_id',$userId)->get();
        foreach($allCart as $cart)
        {
            $order= new Order;
            $order->product_id=$cart['product_id'];
            $order->user_id=$cart['user_id'];
            $order->status="complete";
            $order->Order_quantity=$cart['prod_quantity'];
            $order->payment_method= $req->payment;
            $order->payment_status= "pending";
            $order->address=$req->address;
            $order->save();
            // Cart::where('user_id',$userId)->delete();

        }
        $userId= Session::get('user')['id'];
        $total=DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id',$userId)
        ->select('products.*','cart.id as cart_id')
        // ->sum('products.price');
        ->sum(DB::raw('products.price * cart.prod_quantity'));
        return view('paymentfinal',['total'=>$total,'user_id'=>$userId]);
    }
    function myOrders()
    {
        $userId= Session::get('user')['id'];
        $orders=DB::table('Orders')
        ->join('products','Orders.product_id','=','products.id')
        ->where('Orders.user_id',$userId)
        ->get();

        return view('myorders',['orders'=>$orders]);
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
    $product->size=$req->size;
    $product->category=$req->category;
    $product->quantity=$req->quantity;
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
        $data->size=$req->size;
        $data->category=$req->category;
        $data->quantity=$req->quantity;
        $data->description=$req->description;
        $data->gallery=$req->gallery;
        $data->save();

        return redirect('admindeleteproduct');
    }

    //for categories with different pages
    //first for showing categories list , when selection categories option
   
    function prod_quantity(Request $req){
        $product = new Product;
        $product->prod_quantity=$req->prod_quantity;        
        $product->save();    
        }

//kailash code for category
   // function categoryPro($cat_name){
     //   $data = Product::all()->where('category',$cat_name);
       // $cat = Product::select('category')->distinct()->get();
        //return view('/category_product',['products'=>$data, "category"=>$cat, 'heading'=>$cat_name]);
    //}
    public function categoryPro($cat_name)
    {
        $data = Product::where('category', $cat_name)->get();
        $cat = Product::select('category')->distinct()->get();
        $data = [
            'products' => $data,
            'category' => $cat,
            'heading' => $cat_name,
            'category_name' => $cat_name
        ];
        return view('category_product', $data);
    }
    
    public function sort(Request $request, $category_name = null)
    {
        $sort = $request->input('sort');
        $query = Product::query();
        
        if ($category_name) {
            $query->where('category', $category_name);
            $heading = ucfirst($category_name);
        } else {
            $heading = 'Trending';
        }
        
        $products = $query->get();
        
        if ($sort === 'low') {
            $products = $products->sortBy('price');
        } else {
            $products = $products->sortByDesc('price');
        }
        
        $data = [
            'heading' => $heading,
            'products' => $products,
            'category_name' => $category_name
        ];
        
        return view('category_product', $data);
    }
    
    
    
    
    
    
    
//this code doesnot work for sortint in category
    public function sort1(Request $request, $cat_name = null)
{
    $sort = $request->input('sort');
    $query = Product::query();

    if ($cat_name) {
        $query->where('category', $cat_name);
        $heading = ucfirst($cat_name);
    } else {
        $heading = 'Trending';
    }

    if ($sort === 'low') {
        $query->orderBy('price');
    } else {
        $query->orderByDesc('price');
    }

    $products = $query->get();

    $data = [
        'heading' => $heading,
        'products' => $products
    ];

    return view('category_product', $data);
}
}



