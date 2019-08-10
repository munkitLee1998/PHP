<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faculty;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faculties = Faculty::all();
        return view('viewFaculty', compact('faculties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("addFaculty");
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
            'code'=>'required|max:4',
            'name'=>'required|min:10|max:30',
            'description'=>'required|min:10|max:50',
        ]);
        
        $faculty = new Faculty();
        $faculty->facultyCode = $request->get('code');
        $faculty->facultyName = $request->get('name');
        $faculty->facultyDesc = $request->get('description');
        
        $faculty->save();
        return redirect('faculties')->with('success', 'New faculty has been added');
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
        $faculty = Faculty::find($id);
        return view('updateFaculty', compact('faculty', 'id'));
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
            'code'=>'required|min:4|max:4',
            'name'=>'required|min:10|max:30',
            'description'=>'required|min:10|max:50',
        ]);
        
        $faculty = Faculty::find($id);
        $faculty->facultyDesc =$request->get('description');
        $faculty->facultyName =$request->get('name');
        $faculty->facultyCode =$request->get('code');
        $faculty->save();
        return redirect('faculties');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faculty = Faculty::find($id);
        $faculty->Branch()->detach();
        $faculty->delete();
        return redirect('faculties')->with('success', 'Faculty has been deleted');
    }
    
    public function search(Request $request){
       $search= $request->get('search');
       $faculties = Faculty::where('facultyCode','like','%'.$search.'%')->get();
       
       if (empty($search)){
          $faculties = Faculty::all(); 
       }
       
       return view('filterFaculty',compact('faculties'));
 
    }
}
