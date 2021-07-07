<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use App\Services\PPService;
use Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $users = User::leftJoin('roles', 'roles.id', '=', 'users.role_id')
            ->select('users.*', 'roles.role as role', 'roles.id as role_id');
            return $this->getDatatableOf($users, Auth::user());
        }
        
        return view('user.index');
    }

    private function getDatatableOf($users, $authUser) {
        return DataTables::of($users)
        ->addColumn('actions', function ($user) use ($authUser) {
            $actions['authorizedToEdit'] = $authUser->can('update', [User::class, $user]);
            $actions['authorizedToDelete'] = $authUser->can('delete', [User::class, $user]);
            $actions['edit'] = route('user.edit', $user->id);
            $actions['delete'] = route('user.destroy', $user->id);
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
        $this->authorize('create', User::class);
        $users= User::all();
        $roles = Role::select('id', 'role')->get();
        return view('user.create', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', User::class);
        $inputs = $request->input();
        $inputs['password'] = Hash::make($request->password);
        $inputs['profile'] = $request->profile ? (new PPService())->uploadImage($request->profile, 'profile') : null;
        User::create($inputs);
        return redirect()->route('user.index')
        ->with(['message' => 'User created successfully!', 'alert-type' => 'success']);
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
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user);
        $roles = Role::select('id', 'role')->get();
        return view ('user.create', [
            'roles' => $roles,
        ])->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user);
        $inputs = $request->input();
        $inputs['profile'] = $request->profile ? (new PPService())->uploadImage($request->profile, 'profile') : null;
        $user->update($inputs);
        return redirect()->route('user.index')
        ->with(['message' => 'User created successfully!', 'alert-type' => 'success']);
        return $user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('delete', $user);
        $user->delete();
        return back();
    }
}
