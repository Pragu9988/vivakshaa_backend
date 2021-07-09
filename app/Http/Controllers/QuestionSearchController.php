<?php

namespace App\Http\Controllers;

use App\Question;
use App\Program;
use App\Course;
use App\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;

class QuestionSearchController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = request()->query('search');

        if($search) {
            $questions = Question::where('title', 'LIKE', '%' .$search. '%')
            ->orWhere('year', 'LIKE', '%' .$search. '%')
            ->orWhere('type', 'LIKE', '%' .$search. '%')
            ->orWhere('exam', 'LIKE', '%' .$search. '%')->paginate(3);
        } else {
            $questions = Question::orderBy('id', 'desc')->paginate(10);
        }
        $programs = Program::select('id', 'name')->get();
        $semesters = Semester::select('id', 'name')->get();
        $courses = Course::select('id', 'name')->get();
        return view ('home.question', ['questions' => $questions, 'programs' => $programs, 'semesters' => $semesters, 'courses' => $courses]);
    }

    public function downloadFile(Request $request, $file) {
        $path = public_path('uploads/question/' . $file);
        if (!File::exists($path)) {
            abort(404);
        }

        return response()->download($path);
        // return view('/');
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
     * @param  Question $question
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::find($id);
        return view('home.question-detail')->with('question', $question);
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

    public function getQuestions( Request $request) {
        $program = $request->get('program');
        $semester = $request->get('semester');
        $course = $request->get('course');
        $data = Question::select()->where('program_id', $program)
        ->orWhere('semester_id', $semester)
        ->orWhere('course_id', $course)->get();
        return response()->json($data);
    }
}
