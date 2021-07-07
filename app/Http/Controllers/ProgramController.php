<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Program;
use Yajra\DataTables\DataTables;
use Auth;

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
            return $this->getDatatableOf($programs, Auth::user());
        }
        return view('program.index'); 
    }

    private function getDatatableOf($programs, $user) {
        return DataTables::of($programs)
        ->addColumn('actions', function ($program) use ($user) {
            $actions['authorizedToEdit'] = $user->can('update', [Program::class, $program]);
            $actions['authorizedToDelete'] = $user->can('delete', [Program::class, $program]);
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
        $this->authorize('create', Program::class);
        Program::create($request->all());
        return redirect('/program')->with(['message' => 'Program created sucessfully', 'alert-type' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  Program $program
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Program $program
     * @return \Illuminate\Http\Response
     */
    public function edit(Program $program)
    {
        $this->authorize('update', $program);
        return view('program.create')->with('program', $program);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Program $program
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Program $program)
    {
        $program->update($request->all());
        return redirect('/program')->with(['message' => 'Program updated sucessfully', 'alert-type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Program $program
     * @return \Illuminate\Http\Response
     */
    public function destroy(Program $program)
    {
        $this->authorize('update', $program);
        $program->delete();
        return back()->with(['message' => 'Program deleted sucessfully', 'alert-type' => 'success']);

    }
}
