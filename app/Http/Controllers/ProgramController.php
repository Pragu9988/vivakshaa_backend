<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Program;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use Illuminate\Support\Str;

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
    public function store(Request $request, Program $program)
    {
        $this->authorize('create', Program::class);
        $inputs = $request->input();
        $file = $this->getImageToUpload($request);
        // dd($program->cover_pic);
        $inputs['cover_pic'] = $file ? $this->uploadCoverImage($file, $request->name,  $program) : $program->cover_pic;
        Program::create($inputs);
        return redirect('/program')->with(['message' => 'Program created sucessfully', 'alert-type' => 'success']);
    }

    private function uploadCoverImage($file, $name, $program = null)
    {
        $this->removeImageIfExists($program);
        if (!is_file($file)) {
            return $file;
        }
        $file_ext = $file->getClientOriginalExtension();
        dd($file_ext);
        $name = str_replace(" ", "_", $name);
        $name = strtolower($name);
        $name = $name . date('YmdHis') . '.' . $file_ext;
        $now = Carbon::now();
        $file_path = '/uploads/program/';
        $file->move('.' . $file_path, $name);

        return $name;
    }

    private function removeImageIfExists($program)
    {
        if ($program) {
            $file_path = base_path() . '/public' . $program->cover_pic;
            if (File::exists($file_path) && $program->cover_pic != null) {
                unlink($file_path);
            }
        }
    }

    private function getImageToUpload($request)
    {
        if ($request->cover_pic) {
            return $request->cover_pic;
        } else {
            return null;
        }
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
        $this->authorize('update', $program);
        $inputs = $request->input();
        $file = $this->getImageToUpload($request);
        $inputs['cover_pic'] = $file ? $this->uploadCoverImage($file, $request->name,  $program) : $program->cover_pic;
        $program->update($inputs);
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
        $this->authorize('delete', $program);
        try {
            $program->delete();
        } catch (Exception $e) {
            return back()->with(['message' => 'Something went wrong', 'alert-type' => 'error']);
        }
        return back()->with(['message' => 'Program deleted sucessfully', 'alert-type' => 'success']);

    }
}
