<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Program;
use App\Semester;
use App\Course;
use Yajra\DataTables\DataTables;
use Auth;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $courses = Course::leftJoin('semesters', 'semesters.id', '=', 'courses.semester_id')
            ->leftJoin('programs', 'programs.id', '=', 'courses.program_id')
            ->select('courses.*', 'courses.name as course_name', 'semesters.name as semester_name', 'programs.abbreviation as program_name', 'courses.description as description');
            if($request->semester_id) {
                $courses->where('semester_id', $request->semester_id);
            }
            return $this->getDatatableOf($courses, Auth::user());
        }
        return view('course.index');
    }

    private function getDatatableOf($courses, $user) {
        return DataTables::of($courses)
        // ->editColumn('description', function($course){
        //     return Str::limit(strip_tags($course->description), 50);
        // })
        ->addColumn('actions', function ($course) use ($user) {
            $actions['authorizedToEdit'] = $user->can('update', [Course::class, $course]);
            $actions['authorizedToDelete'] = $user->can('delete', [Course::class, $course]);
            $actions['edit'] = route('course.edit', $course->id);
            $actions['delete'] = route('course.destroy', $course->id);
            return $actions;
        })
        -> make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Course::class);
        $programs = Program::select('id', 'name', 'abbreviation')->get();
        $semesters = Semester::select('id', 'name')->get();
        return view('course.create', ['programs'=>$programs, 'semesters'=>$semesters]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Course::class);
        Course::create($request->all());
        return redirect('/course')->with(['message' => 'Course created sucessfully', 'alert-type' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  Course $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Course $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $this->authorize('update', $course);
        $programs = Program::select('id', 'name', 'abbreviation')->get();
        $semesters = Semester::select('id', 'name')->get();
        return view('course.create', [
            'course' => $course,
            'programs' => $programs,
            'semesters' => $semesters
        ])->with('course', $course);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Course $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $this->authorize('update', $course);
        $course->update($request->all());
        return redirect('/course')->with(['message' => 'Course updated sucessfully', 'alert-type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Course $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $this->authorize('delete', $course);
        $course->delete();
        return back()->with(['message' => 'Course deleted sucessfully', 'alert-type' => 'success']);
    }
}
