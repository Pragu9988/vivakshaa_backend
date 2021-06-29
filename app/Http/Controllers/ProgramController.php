<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Program;
use Yajra\DataTables\DataTables;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $programs = Program::select();
            return $this->getDatatableOf($programs);
        }
        return view('program.index'); 
    }

    private function getDatatableOf($programs) {
        return DataTables::of($programs)
        ->addColumn('actions', function ($program) {
            $actions['edit'] = route('program.edit', $program->id);
            $actions['delete'] = route('program.destroy', $program->id);
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
        return view('program.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Program::create($request->all());
        return redirect('/program');
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
        $program = Program::find($id);
        return view('program.create')->with('program', $program);
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
        $program = Program::find($id);
        $program->update($request->all());
        return redirect('/program');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $program = Program::find($id);
        $program->delete();
        return back();

    }
}
