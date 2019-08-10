<?php
use Illuminate\Support\Facades\Input;
use App\Programme;
use App\Course;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('HomePage');
});

Route::get('login', function () {
    return View::make ('login');
});
Route::get('h2',function () {
    return view('home2');
});
Route::post('logincheck', function () {
    $rules = array(
        'username' => 'required|max:25',
        'password' => 'required|max:25',
    );
    $v = Validator::make (Input::all (), $rules);
    if ($v->fails()){
        Input::flash();
        return Redirect::to('login')->withInput()->withErrors($v->messages ());
    } else{
        $userdata = array(
            'username' => Input::get('username'),
            'password' => Input::get('password')
        );
        
        if (Auth::attempt ($userdata)){
            return Redirect::to('home');
        } else{
            return Redirect::to('login')->withErrors('Incorrect login details');
        }
    }
});

// jp
Route::post('/search', function() {
    $search = Input::get('search');
    $sortLvl = Input::get('level');
    $sortDuration = Input::get('duration');

    if ($search != "") {
        $programmes = Programme::where('progCode', 'LIKE', '%' . $search . '%')->orWhere('faculty_id', 'LIKE', '%' . $search . '%')->orWhere('progName', 'LIKE', '%' . $search . '%')->get();
        //return view(('filter'), compact('programmes'));
        if ($sortLvl == "all") {
            if ($sortDuration == "all") {
                $programmes = Programme::all();
                return view(('filter'), compact('programmes'));
            } else {
                $programmes = Programme::where('duration', $sortDuration)->get();
                return view(('filter'), compact('programmes'));
            }
        } else {
            if ($sortDuration == "all") {
                $programmes = Programme::where('levelOfStudy', $sortLvl)->get();
                return view(('filter'), compact('programmes'));
            } else {
                $programmes = Programme::where('levelOfStudy', $sortLvl)->where('duration', $sortDuration)->get();
                return view(('filter'), compact('programmes'));
            }
        }
    } else {
        if ($sortLvl == "all") {
            if ($sortDuration == "all") {
                $programmes = Programme::all();
                return view(('filter'), compact('programmes'));
            } else {
                $programmes = Programme::where('duration', $sortDuration)->get();
                return view(('filter'), compact('programmes'));
            }
        } else {
            if ($sortDuration == "all") {
                $programmes = Programme::where('levelOfStudy', $sortLvl)->get();
                return view(('filter'), compact('programmes'));
            } else {
                $programmes = Programme::where('levelOfStudy', $sortLvl)->where('duration', $sortDuration)->get();
                return view(('filter'), compact('programmes'));
            }
        }
    }
});

Route::post('/searchCourse', function() {
    $search = Input::get('search');

    if ($search != "") {
        $course = Course::where('courseName', 'LIKE', '%' . $search . '%')->orWhere('courseDesc', 'LIKE', '%' . $search . '%')->orWhere('creditHour', 'LIKE', '%' . $search . '%')->get();
        return view(('filterCourse'), compact('course'));
    }
});

Auth::routes();
Route::resource('accommodations', 'AccommodationController');
Route::resource('branches', 'BranchController');
Route::resource('faculties', 'FacultyController');
Route::resource('programmes', 'ProgrammeController');
Route::resource('mers','merController');
Route::resource('prog_structs','ProgStructController');
Route::resource('courses','CourseController');
Route::resource('fees', 'FeeController');
Route::resource('loans', 'LoanController');
Route::resource('faS','faStaffController');
Route::resource('maS','maStaffController');


Auth::routes();


Route::get('fa','faController@index')->name('fa');
Route::get('ma','maController@index')->name('ma');
Route::get('fs','fsStaffController@index')->name('fs');
Route::get('de','deStaffController@index')->name('de');
Route::get('/home', 'HomeController@index')->name('home');
//jp
Route::get('/search', 'ProgrammeController@searchProgram');
Route::get('/display', 'ProgrammeController@showProgOfProgStruct');
Route::get('/displayCourse', 'CourseController@showCourse');
Route::get('/showProgramme{programme}', 'ProgrammeController@showProgram');
//zx
Route::get('/searchFA','FacultyController@search');
Route::get('/searchAC','AccommodationController@search');
Route::get('/searchFee','FeeController@search');
Route::get('/searchLo','LoanController@search');
Route::get('/searchBr','BranchController@search');