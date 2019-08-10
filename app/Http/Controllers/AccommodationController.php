<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Accommodation;
use DOMDocument;

class AccommodationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accommodations = Accommodation::all();  
        $xml = new \DOMDocument("1.0","UTF-8");
        $xml->formatOutput=true;
        $accommodationsTag = $xml->createElement("accommodations");
        foreach($accommodations as $acc){
            $accommodationTag = $xml->createElement("accommodation");
            $accIDTag = $xml->createElement("accID",$acc->id);
            $accNameTag = $xml->createElement("accName", $acc->accName);
            $accTypeTag = $xml->createElement("accType",$acc->type);
            $accRoomTypeTag = $xml->createElement("accRoomType", $acc->roomType);
            $accAddressTag = $xml->createElement("Address",$acc->address);
            $accFeesTag = $xml->createElement("Fees",$acc->accFees);
            $accommodationTag->appendChild($accIDTag);
            $accommodationTag->appendChild($accNameTag);
            $accommodationTag->appendChild($accTypeTag);
            $accommodationTag->appendChild($accRoomTypeTag);
            $accommodationTag->appendChild($accAddressTag);
            $accommodationTag->appendChild($accFeesTag);
            $accommodationsTag->appendChild($accommodationTag);
        }
        $xml->appendChild($accommodationsTag);
        $xml->save('../resources/views/xml/AccommodationsDB.xml');
        return view('viewAccommodation', compact('accommodations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addAccommodation');
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
            'name'=>'required|min:10|max:30',
            'address'=>'required|min:10|max:50',
            'fees' => 'required'
        ]);
        
        $accommodation = new Accommodation();
        $accommodation->accName = $request->get('name');
        $accommodation->type = $request->get('type');
        $accommodation->roomType = $request->get('roomType');
        $accommodation->address = $request->get('address');
        $accommodation->accFees = $request->get('fees');
        
        $accommodation->save();
        return redirect('accommodations')->with('success', 'New Accommodation added');
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
        $accommodation = Accommodation::find($id);
        return view('updateAccommodation', compact('accommodation', 'id'));
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
            'name'=>'required|min:10|max:30',
            'address'=>'required|min:10|max:50',
            'fees' => 'required'
        ]);
         
        $accommodation = Accommodation::find($id);
        $accommodation->accFees = $request->get('fees');
        $accommodation->address = $request->get('address');
        $accommodation->roomType = $request->get('roomType');
        $accommodation->type = $request->get('type');
        $accommodation->accName = $request->get('name');
        $accommodation->save();
        return redirect('accommodations');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $accommodation = Accommodation::find($id);
        $accommodation->delete();
        return redirect('accommodations')->with('success', 'Information has been deleted');
    }
    
    public function search(Request $request){
       $search= $request->get('search');
       $type= $request->get('type');
       $roomType=$request->get('roomType');
       
       $accommodations = Accommodation::where('accName','like','%'.$search.'%')->where('type',$type)->where('roomType',$roomType)->get();
       if(!empty($type)&&!empty($roomType)&&empty($search)){
          $accommodations=Accommodation::where('type',$type)->where('roomType',$roomType)->get();
          }
       if (empty($search)&&empty($type)&&empty($roomType)){
          $accommodations = Accommodation::all();

       }  
       
      return view('filterAccommodation', compact('accommodations'));
    }
}
