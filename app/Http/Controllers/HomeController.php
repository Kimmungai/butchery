<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supermarket;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index( $supermarketId=1, Request $request )
    {
        if( $request->input('supermarket') ){ $supermarketId=$request->input('supermarket'); }
        session(['selectedSupermarket' => $supermarketId]);
        $currentSupermarket = Supermarket::where('id',$supermarketId)->get();
        $allSupermarkets = Supermarket::get();
        return view('home',compact('currentSupermarket','allSupermarkets'));
    }
}