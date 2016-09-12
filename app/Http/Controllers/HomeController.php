<?php

namespace FinanciaSystem\Http\Controllers;

use FinanciaSystem\Http\Requests;
use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        if(Auth::guest()){
            return redirect('/login');
        }else{
        return view('home');
         }
    }
}
