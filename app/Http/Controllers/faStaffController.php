<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;

class faStaffController extends Controller {

   
    public function index()
    {
        $user = User::all();
        return view('faViewStaff',compact('user'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         
         return view('faAddNewStaff',compact('user'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
           'staffName' => ['required', 'max:255'],
            'staffType' => ['required'],
            'email' => ['required','email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => 'required|same:password',
            
        ],
        [
            'staffName.required'  => 'Name is required',
            'email.required'      => 'Email is required',
            'email.email'         => 'Email is invalid',
            'password.required'   => 'Password is required',
        ]);
        
        $user = new User();
        $user->staffName = $request->get('staffName');
        $user->staffType = $request->get('staffType');
        $user->email = $request->get('email');
        $user->password = $request->get('password');
        
      
        $user->save();
        return redirect('faS')->with('success','Information has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $user = User::find($id);
        return view('faUpdateStaff',compact('user','id','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $request->validate([
           'staffName' => ['required', 'max:255'],
            'staffType' => ['required'],
            'email' => ['required','email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => 'required|same:password',
        ],
        [
            'staffName.required'  => 'Name is required',
            'email.required'      => 'Email is required',
            'email.email'         => 'Email is invalid',
            'password.required'   => 'Password is required',
        ]);
        $user = User::find($id);
        $user->staffName = $request->get('staffName');
        $user->staffType = $request->get('staffType');
        $user->staffEmail = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        
        $user->save();
        return redirect('faS');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('faS')->with('success','Information has been deleted');
    }

}
