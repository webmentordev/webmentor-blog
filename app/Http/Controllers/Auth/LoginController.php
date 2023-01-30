<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Artesaos\SEOTools\Facades\SEOMeta;

class LoginController extends Controller
{
    public function __construct(){
        return $this->middleware('guest');    
    }
    
    public function index(){
        return view('auth.login');
    }

    public function store(Request $request){
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);
        if(!Auth::attempt($request->only('email', 'password'), $request->remember)){
            return back()->with('failed', 'Invalid Login Credientials');
        }
        return redirect()->route('dashboard');
    }
}