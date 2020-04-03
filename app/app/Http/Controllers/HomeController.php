<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\DB;
use App\UserDetailModel;
use DB;

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
        $id =  Auth::user()->id ;
        $userdetail = DB::table('UserDetails')
                        ->where('UserDetails.user_ID','=',$id)
                        ->get();
        return view('home',compact('userdetail'));


    }
}
