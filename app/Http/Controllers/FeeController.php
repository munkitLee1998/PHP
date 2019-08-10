<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fee;
use App\Programme;
use DOMDocument;

class FeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fees = Fee::all();
        $xml = new \DOMDocument("1.0","UTF-8");
        $xml->formatOutput=true;
        $feesTag = $xml->createElement("fees");
        foreach($fees as $fee){
            $feeTag = $xml->createElement("fee");
            $feeIDTag = $xml->createElement("feeID",$fee->id);
            $feeNameTag = $xml->createElement("feeName", $fee->feeName);
            $feeDescTag = $xml->createElement("feeDesc",$fee->desc);
            $feeTypeTag = $xml->createElement("feeType", $fee->feeType);
            $feeAmountTag = $xml->createElement("feeAmount",$fee->amount);
            $programCodeTag = $xml->createElement("programCode",$fee->programme->progCode);
            $feeTag->appendChild($feeIDTag);
            $feeTag->appendChild($feeNameTag);
            $feeTag->appendChild($feeDescTag);
            $feeTag->appendChild($feeTypeTag);
            $feeTag->appendChild($feeAmountTag);
            $feeTag->appendChild($programCodeTag);
            $feesTag->appendChild($feeTag);
        }
        $xml->appendChild($feesTag);
        $xml->save('../resources/views/xml/FeeDB.xml');
        return view('viewFee', compact('fees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $programmes = Programme::all();
        return view('addFee', compact('programmes'));
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
            'name'=>'required|max:30',
            'description'=>'required',
            'amount'=>'required',
        ]);
        $fee = new Fee();
        $fee->feeID = $request->get('ID');
        $fee->feeName = $request->get('name');
        $fee->desc = $request->get('description');
        $fee->feeType = $request->get('type');
        $fee->amount = $request->get('amount');
        $fee->program_id = $request->get('programmeCode');
        
        $fee->save();
        return redirect('fees')->with('success', 'Information has been added');
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
        $fee = Fee::find($id);
        $programmes = Programme::all();
        return view('updateFee', compact('fee', 'id', 'programmes'));
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
            'name'=>'required|max:30',
            'description'=>'required',
            'amount'=>'required',
        ]);
        
        $fee = Fee::find($id);
        $fee->program_id = $request->get('programmeCode');
        $fee->amount = $request->get('amount');
        $fee->feeType = $request->get('type');
        $fee->desc = $request->get('description');
        $fee->feeName = $request->get('name');
        $fee->feeID = $request->get('ID');
        
        $fee->save();
        return redirect('fees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fee = Fee::find($id);
        $fee->delete();
        return redirect('fees')->with('success', 'Information has been deleted');
    }
    
//    public function calculate($id)
//    {
//        $fee = Fee::find($id);
//        return view('calculate',compact('fee', 'id'));
//    }
    public function search(Request $request){
       $search= $request->get('search');
       $type= $request->get('type');
       $programCode=$request->get('programmeCode');
       $programmes = Programme::all();
       //$programmes= Programme::where('id',$search)->get();
       $fees = Fee::where('id',$search)->where('feeType',$type)->where('program_id',$programCode)->get();
       if(!empty($type)&&empty($search)&&!empty($programCode)){
          
          $fees=Fee::where('feeType',$type)->where('program_id',$programCode)->get();
          }
       if (empty($search)&&empty($type)&&empty($programCode)){
          $fees = Fee::all();
          

       }
       
       
      return view('filterFee', compact('fees','programmes'));
    }
}
