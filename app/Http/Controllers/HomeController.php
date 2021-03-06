<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Country;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(Auth::user()->landlord) 
        {
            return redirect()->route('property.index');
        }
        else if(Auth::user()->tenant){
            return view ('tenant.dashboard');
        }
        else {
            return view ('choose');
        }
    }

  
}
