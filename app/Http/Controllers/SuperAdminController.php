<?php

namespace App\Http\Controllers;

use App\Models\group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $user = auth()->user();
        if( !($user->role_id == 1 ) )
        {
            return abort(403);
        }
        $super_admins = User::where('role_id',1)->get();
        return view('admin.super-admin.index',compact('super_admins'));
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
    public function store(Request $request)
    {
        
        $user = auth()->user();
        if( !($user->role_id == 1 ) )
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
        $admin->role_id = 1;
        $admin->save();

        return redirect()->back()->withSuccess('Super Admin Created');
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
    public function update(Request $request , $super_admin_id)
    {
        
        $user = auth()->user();
        if( !($user->role_id == 1 ) )
        {
            return abort(403);
        }
        $request->validate([
            'name' => 'required',
        ]);
        $admin =  User::find($super_admin_id);
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

        return redirect()->back()->withSuccess('Super Admin Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $super_admin_id)
    {
        
        $user = auth()->user();
        if( !($user->role_id == 1 ) )
        {
            return abort(403);
        }
        $admin = User::find($super_admin_id);
        $admin->delete();
        return redirect()->back()->withErrors('Super Admin Deleted');

    }
}
