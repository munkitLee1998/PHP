<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Programme;
use App\mer;

class merController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mers = mer::all();
        return view('viewMer',compact('mers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $programmes = Programme::all();
        return view('addMer',compact('programmes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mer = new mer();
        $mer->examQualify = $request->get('examQualify');
        $mer->merDesc = $request->get('merDesc');
        $mer->program_id = $request->get('programID');
        $mer->save();
        return redirect('mers')->with('Success',"New Information has been addded");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mer = mer::find($id);
        $programmes = Programme::all();
        return view('updateMer',compact('mer','id','programmes'));
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
        $mer = mer::find($id);
        $mer->examQualify = $request->get('examQualify');
        $mer->merDesc = $request->get('merDesc');
        $mer->program_id = $request->get('programID');
        $mer->save();
        return redirect('mers')->with('success','Information has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mer = mer::find($id);
        $mer->delete();
        return redirect('mers')->with('success','Information has been delete');
    }
}
