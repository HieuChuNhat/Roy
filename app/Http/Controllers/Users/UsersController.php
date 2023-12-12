<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product\Booking;
use App\Models\Product\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\Product\Review;
class UsersController extends Controller
{
    



    public function displayOrders(){
        $orders = Order::select()->where('user_id',Auth::user()->id)->orderBy('id','desc')->get();

        return view('users.orders', compact('orders'));
    }

    public function displayBookings(){
        $bookings = Booking::select()->where('user_id',Auth::user()->id)->orderBy('id','desc')->get();

        return view('users.bookings', compact('bookings'));
    }

    public function writeReview(){

        return view('users.writereview');
    }

    public function proccessWriteReview( Request $request){

        $writeReview = Review::create([
            "name" => Auth::user()->name,
            "review" => $request->review,
        ]); 


        if($writeReview){
            return Redirect::route('write.review')->with(['review'=>"review submitted successfully"]);;
        }
    }
    
    
}
