<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Programme;
use App\Faculty;
use App\Branch;
use App\progStruct;
use App\mer;
use DOMDocument;

class ProgrammeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programmes = Programme::all();
        $xml = new \DOMDocument("1.0", "UTF-8");
        $xml->formatOutput=true;
        $programsTag = $xml->createElement("programs");
        foreach($programmes as $program){
            $programTag = $xml->createElement("program");
            $programIDTag = $xml->createElement("programID", $program->id);
            $programCodeTag = $xml->createElement("programCode", $program->progCode);
            $programNameTag = $xml->createElement("programName", $program->progName);
            $programDescTag = $xml->createElement("programDesc", $program->desc);
            $programDurationTag = $xml->createElement("programDuration", $program->duration);
            $programLevelTag = $xml->createElement("programLevel", $program->levelOfStudy);
            $facultyCodeTag = $xml->createElement("facultyCode", $program->facultyCode);
            foreach($program->branch as $branches){
                $branchNameTag = $xml->createElement("branchName", $branches->branchName);
                
                $programTag->appendChild($programIDTag);
                $programTag->appendChild($programCodeTag);
                $programTag->appendChild($programNameTag);
                $programTag->appendChild($programDescTag);
                $programTag->appendChild($programDurationTag);
                $programTag->appendChild($programLevelTag);
                $programTag->appendChild($facultyCodeTag);
                $programTag->appendChild($branchNameTag);
                $programsTag->appendChild($programTag);
            }
            
        }
        $xml->appendChild($programsTag);
        $xml->save('../resources/views/xml/ProgrammeDB.xml');
        return view('viewProgramme', compact('programmes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $faculties = Faculty::all();
        $branches = Branch::all();
        return view('addProgramme', compact('faculties', 'branches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $programme = new Programme();
        $programme->progCode = $request->get('code');
        $programme->progName = $request->get('name');
        $programme->desc = $request->get('description');
        $programme->duration = $request->get('duration');
        $programme->levelOfStudy = $request->get('level');
        $programme->faculty_id = $request->get('facultyCode');
        $programme->save();
        
        $programme->Branch()->sync($request->branchName, false);
        return redirect('programmes')->with('success', 'Information has been added');
    }

    public function searchProgram() {
        $programmes = Programme::all();
        return view('filter', compact('programmes'));
    }

    public function showProgram($id) {
        $programmes = Programme::find($id);
        $progStructs = progStruct::find($id);
        $mers = mer::find($id);
        return view('showProg', compact('programmes', 'progStructs', 'mers', 'id'));
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
        $programme = Programme::find($id);
        $faculties = Faculty::all();
        $branches = Branch::all();
        return view('updateProgramme', compact('programme', 'id', 'faculties', 'branches'));
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
        $programme = Programme::find($id);
        $programme->faculty_id = $request->get('facultyCode');
        $programme->levelOfStudy = $request->get('level');
        $programme->duration = $request->get('duration');
        $programme->desc = $request->get('description');
        $programme->progName = $request->get('name');
        $programme->progCode = $request->get('code');
        $programme->save();
        
        if(isset($request->branchName)){
            $programme->Branch()->sync($request->branchName);
        }else{
            $programme->Branch()->sync(array());
        }
        return redirect('programmes');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $programme = Programme::find($id);
        $programme->Course()->detach();
        $programme->Branch()->detach();
        $programme->delete();
        return redirect('programmes')->with('success', 'Information has been deleted');
    }
}
