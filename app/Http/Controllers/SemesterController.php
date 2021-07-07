<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Semester;
use Yajra\DataTables\DataTables;
use Auth;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $semesters = Semester::select();
            return $this->getDatatableOf($semesters, Auth::user());
        }
        return view('semester.index');
    }

    private function getDatatableOf($semesters, $user) {
        return DataTables::of($semesters)
        ->addColumn('actions', function ($semester) use ($user) {
            $actions['authorizedToEdit'] = $user->can('update', [Semester::class, $semester]);
            $actions['authorizedToDelete'] = $user->can('delete', [Semester::class, $semester]);
            $actions['edit'] = route('semester.edit', $semester->id);
            $actions['delete'] = route('semester.destroy', $semester->id);
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
        $this->authorize('create', Semester::class);
        return view('semester.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Semester::class);
        Semester::create($request->all());
        return redirect('/semester');
    }

    /**
     * Display the specified resource.
     *
     * @param  Semester $semester
     * @return \Illuminate\Http\Response
     */
    public function show(Semester $semester)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Semester $semester
     * @return \Illuminate\Http\Response
     */
    public function edit(Semester $semester)
    {
        $this->authorize('update', $semester);
        return view('semester.create')->with('semester', $semester);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Semester $semester
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Semester $semester)
    {
        $this->authorize('update', $semester);
        $semester->update($request->all());
        return redirect('/semester');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Semester $semester
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', $semester);
        $semester = Semester::find($id);
        $program->delete();
        return back();
    }
}
