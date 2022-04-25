<?php

namespace App\Http\Controllers\user_managment;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
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
            'name'=>'required|unique:permissions|alpha',
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

    public function assignPermission()
    {
        $roles = Role::all();
        $permissions = Permission::all();

        return view('admin.assignPermission',compact('roles','permissions'));
    }

    public function savePermission(Request $request)
    {
        $role = Role::findOrfail($request->roleid);


        $checkperm = Permission::whereHas('roles',function($query) use($request){
            $query->where(['permission_id'=>$request->permissionid, 'role_id'=>$request->roleid]);
        })->first();
        if($checkperm)
        {
            return back()->with('error','Permission already exist');
        }
        else
        {
            $role->givePermissionTo($request->permissionid);
            return back()->with('message','Permission Assigned');
        }
    }

}
