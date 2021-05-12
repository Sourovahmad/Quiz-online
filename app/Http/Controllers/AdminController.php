<?php

namespace App\Http\Controllers;

use App\Models\group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($group_id)
    {
        $user = auth()->user();
        if( !($user->role_id == 1 || ($user->role_id == 2 && $user->group_id == $group_id)) )
        {
            return abort(403);
        }
        $group = group::find($group_id);
        if(is_null($group)){
            return abort(404);
        }
        return view('admin.admin.index',compact('group'));
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
    public function store(Request $request, $group_id)
    {
        $user = auth()->user();
        if( !($user->role_id == 1 || ($user->role_id == 2 && $user->group_id == $group_id)) )
        {
            return abort(403);
        }
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:8',
        ]);
        $admin = new User;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->group_id = $group_id;
        $admin->role_id = 2;
        $admin->save();

        return redirect()->back()->withSuccess('Admin Created');

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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $group_id , $admin_id)
    {
        $user = auth()->user();
        if( !($user->role_id == 1 || ($user->role_id == 2 && $user->group_id == $group_id)) )
        {
            return abort(403);
        }
        $request->validate([
            'name' => 'required',
        ]);
        $admin =  User::find($admin_id);
        $admin->name = $request->name;
        if(!is_null($request->email)){
            
            $request->validate([
                'email' => 'required|unique:users|email',
            ]);
            $admin->email = $request->email;
        }
        if(!is_null($request->password)){
            
            $request->validate([
                'password' => 'required|min:8',
            ]);
            $admin->password = Hash::make($request->password);
        }
        $admin->save();

        return redirect()->back()->withSuccess('Admin Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $group_id , $admin_id)
    {
        $user = auth()->user();
        if( !($user->role_id == 1 || ($user->role_id == 2 && $user->group_id == $group_id)) )
        {
            return abort(403);
        }
        $admin = User::find($admin_id);
        $admin->delete();
        return redirect()->back()->withErrors('Admin Deleted');
    }
}
