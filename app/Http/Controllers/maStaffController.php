<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\addstaff;
use Illuminate\Http\Request;

class maStaffController extends Controller {

    public function index() {
        $user = User::all();
        $xml = new \DOMDocument("1.0","UTF-8");
        $xml->formatOutput=true;
        $userTag = $xml->createElement("user");
        foreach ($user as $users){
            $usersTag = $xml->createElement("user");
            $usersIDTag = $xml->createElement("id",$users->id);
            $usersNameTag = $xml->createElement("staffName",$users->staffName);
            $usersTypeTag = $xml->createElement("staffType",$users->staffType);
            $usersEmailTag = $xml->createElement("email",$users->email);
            $usersPasswordTag = $xml->createElement("password",$users->password);
            $usersTag->appendChild($usersIDTag);
            $usersTag->appendChild($usersNameTag);
            $usersTag->appendChild($usersTypeTag);
            $usersTag->appendChild($usersEmailTag);
            $usersTag->appendChild($usersPasswordTag);
            $userTag->appendChild($usersTag);
            
        }
        $xml->appendChild($userTag);
        $xml->save("../resources/views/xml/staff.xml");
        return view('maViewStaff', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        return view('maAddNewStaff', compact('user'));
    }
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

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
        return redirect('maS')->with('success', 'Information has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $user = User::find($id);
        return view('maUpdateStaff', compact('user', 'id', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $request->validate([
            'staffName' => ['required', 'max:255'],
            'staffType' => ['required'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => 'required|same:password',
                ], [
            'staffName.required' => 'Name is required',
            'email.required' => 'Email is required',
            'email.email' => 'Email is invalid',
            'password.required' => 'Password is required',
        ]);
        $user = User::find($id);
        $user->staffName = $request->get('staffName');
        $user->staffType = $request->get('staffType');
        $user->email = $request->get('email');
        $user->password = $request->get('password');

        $user->save();
        return redirect('maS');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $user = User::find($id);
        $user->delete();
        return redirect('maS')->with('success', 'Information has been deleted');
    }

    public function make(Request $request) {
        $staff = $this->store([
            'staffName' => $request->get('staffName'),
            'staffType' => ['required'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => 'required|same:password',
                ], [
            'staffName.required' => 'Name is required',
            'email.required' => 'Email is required',
            'email.email' => 'Email is invalid',
            'password.required' => 'Password is required',
        ]);
        return $staff;
    }

}
