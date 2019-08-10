<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Faculty;
use App\Branch;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches = Branch::all();
        return view('viewBranch', compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $faculties = Faculty::all();
        return view('addBranch', compact('faculties'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $branch = new Branch();
        $branch->branchName = $request->get('name');
        $branch->branchEmail = $request->get('email');
        $branch->branchContact = $request->get('contact');
        $branch->save();
        $branch->Faculty()->sync($request->branchName, false);
        return redirect('branches')->with('success', 'Information has been added');
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
        $branch = Branch::find($id);
        $faculties = Faculty::all();
        return view('updateBranch', compact('branch', 'id', 'faculties'));
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
        $branch = Branch::find($id);
        $branch->branchContact = $request->get('contact');
        $branch->branchEmail = $request->get('email');
        $branch->branchName = $request->get('name');
        $branch->save();
        
        if(isset($request->branchName)){
            $branch->Faculty()->sync($request->branchName);
        }else{
            $branch->Faculty()->sync(array());
        }
        return redirect('branches');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $branch = Branch::find($id);
        $branch->Programme()->detach();
        $branch->Faculty()->detach();
        $branch->delete();
        return redirect('branches')->with('success', 'Information has been deleted');
    }
        public function search(Request $request){
       $search= $request->get('search');
       $branches = Branch::where('branchName','like','%'.$search.'%')->get();
       
       if (empty($search)){
          $branches = Branch::all(); 
       }
       
       return view('filterBranch',compact('branches'));
 
    }

}
