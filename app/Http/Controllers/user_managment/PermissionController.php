<?php

namespace App\Http\Controllers\user_managment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.permissionList',compact('permissions'));
    }
    public function addPermission()
    {
        return view('admin.permissionForm');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
        ]);
        $query = Permission::create($request->all());
        if($query)
        {
            return redirect()->back()->with('message','Permission Added Successfully');
        }
        else
        {
            return redirect()->back()->with('error','Error in query');
        }
    }

}
