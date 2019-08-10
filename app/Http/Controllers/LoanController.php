<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Loan;
use App\Programme;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loans = Loan::all();
        return view('viewLoan', compact('loans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $programmes = Programme::all();
        return view('addLoan', compact('programmes'));
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
            'ID'=>'required',
            'owner'=>'required|max:30',
            'amount'=>'required',
        ]);
        
        $loan = new Loan();
        $loan->loanID = $request->get('ID');
        $loan->loanOwner = $request->get('owner');
        $loan->loanType = $request->get('type');
        $loan->loanOwnerType = $request->get('ownerType');
        $loan->amount = $request->get('amount');
        $loan->save();
        
        $loan->Programme()->sync($request->programmeCode, false);
        return redirect('loans')->with('success', 'Information has been added');
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
        $loan = Loan::find($id);
        $programmes = Programme::all();
        return view('updateLoan', compact('loan', 'id', 'programmes'));
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
            'ID'=>'required',
            'owner'=>'required|max:30',
            'amount'=>'required',
        ]);
        
        $loan = Loan::find($id);
        $loan->amount = $request->get('amount');
        $loan->loanOwnerType = $request->get('ownerType');
        $loan->loanType = $request->get('type');
        $loan->loanOwner = $request->get('owner');
        $loan->loanID = $request->get('ID');
        $loan->save();
        
        if(isset($request->programmeCode)){
            $loan->Programme()->sync($request->programmeCode);
        }else{
            $loan->Programme()->sync(array());
        }
        
        return redirect('loans');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $loan = Loan::find($id);
        $loan->Programme()->detach();
        $loan->delete();
        return redirect('loans')->with('success', 'Information has been deleted');
    }
    
      public function search(Request $request){
       $search= $request->get('search');
       $type= $request->get('type');
       $ownerType=$request->get('ownerType');
       $programmes = Programme::all();
       //$programmes= Programme::where('id',$search)->get();
       $loans = Loan::where('loanID','like','%'.$search.'%')->orwhere('loanOwner','like','%'.$search.'%')->where('loanType',$type)->where('loanOwnerType',$ownerType)->get();
       if(!empty($type)&&empty($search)&&!empty($ownerType)){
          
          $loans=Loan::where('loanType',$type)->where('loanOwnerType',$ownerType)->get();
          }
       if (empty($search)&&empty($type)&&empty($ownerType)){
          $loans = Loan::all();

       }
 
      return view('filterLoan', compact('loans'));
    }
}
