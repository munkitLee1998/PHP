<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Programme;
use App\Course;
use DOMDocument;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        $xml = new \DOMDocument("1.0","UTF-8");
        $xml->formatOutput=true;
        $coursesTag = $xml->createElement("courses");
        foreach($courses as $course){
            $courseTag = $xml->createElement("course");
            $courseIDTag = $xml->createElement("courseID",$course->id);
            $courseNameTag = $xml->createElement("courseName", $course->courseName);
            $courseDescTag = $xml->createElement("courseDesc",$course->courseDesc);
            $creditHourTag = $xml->createElement("creditHour", $course->creditHour);
            $courseTag->appendChild($courseIDTag);
            $courseTag->appendChild($courseNameTag);
            $courseTag->appendChild($courseDescTag);
            $courseTag->appendChild($creditHourTag);
            $coursesTag->appendChild($courseTag);
        }
        $xml->appendChild($coursesTag);
        $xml->save('../resources/views/xml/CourseDB.xml');
        return view('viewCourse',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $programmes = Programme::all();
        return view('addCourse', compact('programmes'));
    }
    
    public function showCourse(Request $request)
    {
        $course = Course::all();
        return view('filterCourse', compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $course = new Course();
        $course->courseName = $request->get('name');
        $course->courseDesc = $request->get('desc');
        $course->creditHour = $request->get('creditHour');
        $course->save();
        
        $course->Programme()->sync($request->programmeID, false);
        return redirect('courses')->with('success','Information of course has been addded');
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
        $course = Course::find($id);
        $programmes = Programme::all();
        return view('updateCourse', compact('course', 'id', 'programmes'));
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
        $course = Course::find($id);
        $course->creditHour = $request->get('creditHour');
        $course->courseDesc = $request->get('desc');
        $course->courseName = $request->get('name');
        
        $course->save();
        if(isset($request->programmeID)){
            $course->Programme()->sync($request->programmeID);
        }else{
            $course->Programme()->sync(array());
        }
        
        return redirect('courses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        $course->Programme()->detach();
        $course->delete();
        return redirect('courses')->with('success', 'Information has been deleted');
    }
}
