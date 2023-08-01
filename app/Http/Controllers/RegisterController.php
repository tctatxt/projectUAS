<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Foundation\Auth\User;

class RegisterController extends Controller
{
    public function addUser(Request $request){
        // @dd($request);
        $validate = $request->validate([
            'linkedin' => 'required',
            'password' => 'required',
            'email' => 'required|unique:users',
            'gender' => 'required',
            'phoneNumber' =>'required|numeric',
            'city_id'=> 'required',
            'image'=>'required|image|file',
            'price' => 'required',
            'name' => 'required',
            'bayar' =>'required',
            'prof1' => 'required',
            'prof2' => 'required',
            'prof3' => 'required'
        ]);
        $validate['image'] = $request->file('image')->store('/');
        $validate['password'] = bcrypt($validate['password']);
        $validate['name'] =substr($validate['linkedin'], 28);
        User::create($validate);
        return redirect('/login')->with('registerSuccess', 'You Success register');
    }
    public function loginUser(Request $request){
        // @dd($request);
        $validate = $request->validate([
            'password' => 'required',
            'email' => 'required',
        ]);

        if(Auth::attempt($validate)){
            $request->session()->regenerate();
            return redirect('/payment');


        }
        return redirect()->back()->with('loginEror', 'Login failed');
    }

}
