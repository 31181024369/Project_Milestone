<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thuoctinh;
use App\Models\Attribute;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //$products=Attribute::orderBy('id','DESC')->get();
        $products=Attribute::orderBy('id','DESC')->paginate(4);
        //return $sp;
        return view('home',compact('products'));
    }
}
