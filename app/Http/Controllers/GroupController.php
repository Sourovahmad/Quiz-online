<?php

namespace App\Http\Controllers;

use App\Models\group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->role_id != 1){
            return abort(403);
        }
        $groups = group::all();
        return view('admin.group.index',compact('groups'));
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
        
        if(auth()->user()->role_id != 1){
            return abort(403);
        }
        $request->validate([
            'name' => 'required',
        ]);
        $group = new group;
        $group->name = $request->name;
        $group->save();
        return redirect()->back()->withSuccess('Group Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(group $group)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, group $group)
    {
        
        if(auth()->user()->role_id != 1){
            return abort(403);
        }
        
        $request->validate([
            'name' => 'required',
        ]);
        $group->name = $request->name;
        $group->save();

        return redirect()->back()->withSuccess('Group Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(group $group)
    {
        
        if(auth()->user()->role_id != 1){
            return abort(403);
        }
        $group->delete();
        return redirect()->back()->withErrors('Group Deleted');
    }
}
