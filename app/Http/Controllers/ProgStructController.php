<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Programme;
use App\progStruct;

class ProgStructController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $progStructs = progStruct::all();
        return view('viewProgStruct',compact('progStructs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $programmes = Programme::all();
        return view('addProgStruct',compact('programmes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $progStruct = new progStruct();
        $progStruct->structCode = $request->get('structCode');
        $progStruct->ProCert = $request->get('proCert');
        $progStruct->certDesc = $request->get('certDesc');
        $progStruct->program_id = $request->get('programID');
        $progStruct->save();
        return redirect('prog_structs')->with('Success','New programme structure added');
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
        $progStruct = ProgStruct::find($id);
        $programmes = Programme::all();
        return view('updateProgStruct',compact('progStruct','id','programmes'));
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
        $progStruct = progStruct::find($id);
        $progStruct->structCode = $request->get('structCode');
        $progStruct->ProCert = $request->get('proCert');
        $progStruct->certDesc = $request->get('certDesc');
        $progStruct->program_id = $request->get('programID');
        $progStruct->save();
        return redirect('prog_structs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $progStruct = progStruct::find($id);
        $progStruct->delete();
        return redirect('prog_structs')->with('success','Information has been deleted');
    }
}
