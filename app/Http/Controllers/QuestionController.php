<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Question;
use App\Course;
use App\Program;
use App\Semester;
use App\User;
use App\Services\FileUploadService;
use App\Services\PPService;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use Auth;

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
            ->leftJoin('users', 'users.id', '=', 'questions.user_id')
            ->select('questions.*', 
            'questions.id as id',
            'questions.title as title', 
            'programs.abbreviation as program_abbr', 
            'semesters.name as semester_name', 
            'courses.name as course_name',
            'users.name as user_name',
        );
            return $this->getDatatableOf($questions, Auth::user());
        }
        
        return view('question.index');
    }

    private function getDatatableOf($questions, $user) {
        return DataTables::of($questions)
        ->addColumn('created_by', function ($question) {
            return $question->user_name;
        })
        ->addColumn('actions', function ($question)  use ($user) {
            $actions['authorizedToEdit'] = $user->can('update', [Question::class, $question]);
            $actions['authorizedToDelete'] = $user->can('delete', [Question::class, $question]);
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
        $this->authorize('create', Question::class);
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
    public function store(Request $request, Question $question)
    {
        $inputs = $request->input();
        $file = $this->getImageToUpload($request);
        $inputs['user_id'] = $request->user()->id;
        $inputs['is_active'] = isset($request->is_active)?1:0;
        $inputs['thumbnail'] = $request->thumbnail
        ? (new PPService())->uploadImage($request->thumbnail, 'thumbnail', $this->model_name) 
        : null;
        $inputs['question_file'] = $file ? $this->uploadCoverImage($file, $request->title, $question) : $question->question_file;
        Question::create($inputs);
        return redirect('/question')->with(['message' => 'Question created successfully!', 'alert-type' => 'success']);
    }

    private function uploadCoverImage($file, $title, $question = null)
    {
        $this->removeImageIfExists($question);
        if (!is_file($file)) {
            return $file;
        }
        $file_ext = $file->getClientOriginalExtension();
        $title = str_replace(" ", "_", $title);
        $title = strtolower($title);
        $title = $title . date('YmdHis') . '.' . $file_ext;
        $now = Carbon::now();
        $file_path = '/uploads/question/';
        $file->move('.' . $file_path, $title);

        return $title;
    }

    private function removeImageIfExists($question)
    {
        if ($question) {
            $file_path = base_path() . '/public' . $question->question_file;
            if (File::exists($file_path) && $question->question_file != null) {
                unlink($file_path);
            }
        }
    }

    private function getImageToUpload($request)
    {
        if ($request->question_file) {
            return $request->question_file;
        } else {
            return null;
        }
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
     * @param  int  Question $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        $this->authorize('update', $question);
        $programs = Program::select('id', 'name')->get();
        $semesters = Semester::select('id', 'name')->get();
        $courses = Course::select('id', 'name')->get();
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
    public function update(Request $request, Question $question)
    {
        $this->authorize('update', $question);
        $inputs = $request->input();
        $inputs['is_active'] = isset($request->is_active)?1:0;
        $inputs['thumbnail'] = $request->thumbnail
        ? (new PPService())->uploadImage($request->thumbnail, 'thumbnail', $this->model_name) 
        : null;
        $inputs['question_file'] = $request->question_file
        ? (new FileUploadService())->uploadFile($request->question_file, 'question_file', $this->model_name)
        : null;
        $question->update($inputs);
        return redirect('/question')->with(['message' => 'Question updated successfully!', 'alert-type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Question $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->delete();
        return back()->with(['message' => 'Question deleted successfully!', 'alert-type' => 'success']);
    }
}
