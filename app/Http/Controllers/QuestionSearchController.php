<?php

namespace App\Http\Controllers;

use App\Question;
use App\Program;
use App\Course;
use App\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class QuestionSearchController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::orderBy('id', 'desc')->paginate(10)->all();
        $programs = Program::select('id', 'name')->get();
        $semesters = Semester::select('id', 'name')->get();
        $courses = Course::select('id', 'name')->get();
        return view ('home.question', ['questions' => $questions, 'programs' => $programs, 'semesters' => $semesters, 'courses' => $courses]);
    }

    public function downloadFile($file) {
        return response()->download(storage_path('app/public/'.$file));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
