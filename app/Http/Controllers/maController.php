<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\User;

use Illuminate\Http\Request;

class maController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 
  public function index(Request $request)
    {
            
            $request->user()->authorizeRoles('main admin');
            return view('maHome');
        
    }
}
