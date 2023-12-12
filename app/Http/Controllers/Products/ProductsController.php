<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product\Product;
use App\Models\Product\Cart;
use App\Models\Product\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\Product\Booking;


class ProductsController extends Controller
{
    

    
    public function singleProduct($id){

        $product = Product::find($id);


        $relatedProducts = Product::where('type',$product->type)
        ->where('id','!=',$id)->take('4')
        ->orderBy('id','desc')
        ->get();
        
        if(isset(Auth::user()->id)){
           
    
    
            //checking for products in cart
            $checkingInCart = Cart::where('pro_id',$id)
            ->where('user_id',Auth::user()->id)
            ->count();

            return view('products.productsingle',compact('product','relatedProducts','checkingInCart'));
        }else{
            return view('products.productsingle',compact('product','relatedProducts'));
        }

        

        
    }

    public function addCart(Request $request, $id)
{
    $addCart = Cart::create([
        "pro_id" => $request->pro_id, 
        "name" => $request->name,
        "image" => $request->image,
        "price" => $request->price,
        "user_id" => Auth::user()->id,
    ]);

    return Redirect::route('product.single',$id)->with(['success'=>"product added to cart succesffully"]);
}

public function cart()
{
    $cartProducts = Cart::where('user_id',Auth::user()->id)
        ->orderBy('id','desc')
        ->get();

    $totalPrice = Cart::where('user_id',Auth::user()->id)
        ->sum('price');

        return view('products.cart',compact('cartProducts','totalPrice'));

}


public function deleteProductCart($id)
{
    $deleteProductCart = Cart::where('pro_id',$id)
    ->where('user_id',Auth::user()->id);

    $deleteProductCart->delete();

    if($deleteProductCart){

        return Redirect::route('cart')->with(['delete'=>"product deleted from cart succesffully"]);
    }

        

}


public function prepareCheckout(Request $request)
{
    $value = $request->price;

    $price = Session::put('price',$value);

    $newPrice = Session::get($price);

    if($newPrice > 0){

        return Redirect::route('checkout');
    }

        

}


public function checkout()
{
    return view('products.checkout');

}


public function storeCheckout(Request $request)
{
    $checkout = Order::create([
        "first_name" => $request->input("first_name"),
        "last_name" => $request->input("last_name"),
        "state" => $request->input("state"),
        "address" => $request->input("address"),
        "city" => $request->input("city"),
        "zip_code" => $request->input("zip_code"),
        "phone" => $request->input("phone"),
        "email" => $request->input("email"),
        "price" => $request->input("price"),
        "user_id" => $request->input("user_id"),
        "status" => "proccessing", 
    ]);
    
    if($checkout){
        return Redirect::route('products.pay');
    };

}               

public function payWithPayPal()
{
    
    return view('products.pay');

}   

public function success()
{
    $deleteItems = Cart::where('user_id',Auth::user()->id);
    $deleteItems -> delete();
    if ($deleteItems) {

        Session::forget('price');
        return view('products.success');
    }



    

}   


public function bookingTables(Request $request)
{
    Request()->validate([
        "first_name"=>"required|max:40",
        "last_name"=>"required|max:40",
        "date"=>"required",
        "time"=>"required",
        "phone"=>"required|max:40",
        "message"=>"required",
    ]);
    
    if ($request->date > date('n/j/Y')) {
        $bookingTables = Booking::create([
            "first_name" => $request->input("first_name"),
            "last_name" => $request->input("last_name"),
            "date" => $request->input("date"),
            "time" => $request->input("time"),
            "phone" => $request->input("phone"),
            "message" => $request->input("message"),
            "user_id" => $request->input("user_id"),
        ]);
        
        if($bookingTables){
            return Redirect::route('home')->with(['booking'=>"you booking a table successfully"]);;
        }
    }
    else {
        return Redirect::route('home')->with(['date'=>"invalide date, choose a date in the future"]);
    }
    

}



public function menu()
{
    $desserts = Product::select()->where("type","desserts")->orderBy('id','desc')->take(4)->get();
    $drinks = Product::select()->where("type","drinks")->orderBy('id','desc')->take(4)->get();


        return view('products.menu',compact('desserts','drinks'));
}   
}
