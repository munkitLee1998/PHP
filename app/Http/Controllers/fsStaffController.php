<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class fsStaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index(Request $request)
    {
            
            $request->user()->authorizeRoles('faculty staff');
            return view('fsHome');
        
    }

}
