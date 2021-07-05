<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Question;
use App\Course;
use App\Program;
use App\Semester;
use App\Services\FileUploadService;
use App\Services\PPService;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;


class QuestionController extends Controller
{
    public $model_name = 'question';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $questions = Question::leftJoin('programs', 'programs.id', '=', 'questions.program_id')
            ->leftJoin('semesters', 'semesters.id', '=', 'questions.semester_id')
            ->leftJoin('courses', 'courses.id', '=', 'questions.course_id')
            ->select('questions.*', 
            'questions.title as title', 
            'programs.abbreviation as program_abbr', 
            'semesters.name as semester_name', 
            'courses.name as course_name');
            return $this->getDatatableOf($questions);
        }
        
        return view('question.index');
    }

    private function getDatatableOf($questions) {
        return DataTables::of($questions)
        ->addColumn('actions', function ($question) {
            $actions['edit'] = route('question.edit', $question->id);
            $actions['delete'] = route('question.destroy', $question->id);
            return $actions;
        })
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $programs = Program::select('id', 'name')->get();
        $semesters = Semester::select('id', 'name')->get();
        $courses = Course::select('id', 'name')->get();
        return view('question.create', ['programs' => $programs, 'semesters' => $semesters, 'courses' => $courses]);
    }

    public function fetch(Request $request) {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = Course::select('id', 'name')->where('program_id', $value)->get();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->input();
        $inputs['is_active'] = isset($request->is_active)?1:0;
        $inputs['thumbnail'] = $request->thumbnail
        ? (new PPService())->uploadImage($request->thumbnail, 'thumbnail', $this->model_name) 
        : null;
        $inputs['question_file'] = $request->question_file
        ? (new FileUploadService())->uploadFile($request->question_file, 'question_file', $this->model_name)
        : null;
        Question::create($inputs);
        return redirect('/question');
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
        $programs = Program::select('id', 'name')->get();
        $semesters = Semester::select('id', 'name')->get();
        $courses = Course::select('id', 'name')->get();
        $question = Question::find($id);
        return view ('question.create', [
            'programs' => $programs,
            'semesters' => $semesters,
            'courses' => $courses
        ])->with('question', $question);
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
        $inputs = $request->input();
        $inputs['is_active'] = isset($request->is_active)?1:0;
        $inputs['thumbnail'] = $request->thumbnail
        ? (new PPService())->uploadImage($request->thumbnail, 'thumbnail', $this->model_name) 
        : null;
        $inputs['question_file'] = $request->question_file
        ? (new FileUploadService())->uploadFile($request->question_file, 'question_file', $this->model_name)
        : null;
        $question = Question::find($id);
        $question->update($inputs);
        return redirect('/question');
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
