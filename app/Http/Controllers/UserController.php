<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Connect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function payment(Request $request){
        $bayar = $request->price;
        $user = User::find(auth()->user()->id);
        if ($bayar < auth()->user()->price) {
            // @dd(auth()->user()->price);
            return redirect('/payment')->with('paymentGagal', 'You are still underpaid');
        } elseif ($bayar == auth()->user()->price) {
            // @dd($user);
            $user->price = 0;
            $user->bayar = $bayar;
            $user->update();
            return redirect('/home');
        } else {
            $user->bayar = 1;
            $user->update();
            return redirect('/payment')->with('kelebihan', 'Sorry you overpaid, would you like to enter a
            balance?');
        }


    }

    public function pricekurang(Request $request){
        $user = User::find(auth()->user()->id);
        $user->bayar = $user->bayar-$user->price;
        $user->update();
        return redirect('/home');
    }

    public function pricebiasa(Request $request){
        $user = User::find(auth()->user()->id);
        $user->bayar = 0;
        $user->update();
        return redirect('/payment');
    }

    public function selectgender(Request $request){
        // @dd($request);
        $selectGender = $request->thegender;
        return view('home', compact('selectGender'));
    }

    public function connect(Request $request){
        Connect::create([
            'kdState' => '1',
            'user1' => auth()->user()->id,
            'user2' => $request->user2,
            'diconnect'=>$request->user2
        ]);
        return redirect('/home');
    }

    public function logout(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    }

    public function yukconnect(Request $request){
        $hub = Connect::find($request->matchers);
        $hub->kdState = '2';
        $hub->update();
        return redirect()->back();
    }
}
