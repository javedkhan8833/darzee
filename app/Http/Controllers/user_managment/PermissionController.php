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

    public function permEdit($id)
    {
        $permission = Permission::find($id);
        return view('admin.editPermission',compact('permission'));
    }

    public function permDelete($id)
    {
        $delete = Permission::destroy($id);
        if($delete)
        {
            return back()->with('message','Permission Deleted');

        }
        else{
            return back()->with('message','Permission Not deleted');
        }
    }

    public function permUpdate(Request $request,$id)
    {
        $update = Permission::where('id',$id)->update(['name' => $request->name]);
        if($update)
        {
            return redirect()->route('permission_list')->with('message','Permission Updated');
        }
        else
        {
            return redirect()->route('permission_list')->with('message','Permission not updated');
        }
    }

}
