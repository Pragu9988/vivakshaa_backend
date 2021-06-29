<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Semester;
use Yajra\DataTables\DataTables;

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
            return $this->getDatatableOf($semesters);
        }
        return view('semester.index');
    }

    private function getDatatableOf($semesters) {
        return DataTables::of($semesters)
        ->addColumn('actions', function ($semester) {
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
        Semester::create($request->all());
        return redirect('/semester');
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
        $semester = Semester::find($id);
        return view('semester.create')->with('semester', $semester);
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
        $semester = Semester::find($id);
        $semester->update($request->all());
        return redirect('/semester');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $semester = Semester::find($id);
        $program->delete();
        return back();
    }
}
