<?php

namespace App\Http\Controllers\user_managment;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('admin.roleslist',compact('roles'));
    }
    public function create()
    {
        return view('admin.roleform');
    }
    public function saveRole(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:roles',
        ]);

        $name = $request->all();
        $role = Role::create($name);
        if($role)
        {
            return redirect()->back()->with('message','Role Added Successfully');
        }
        else{
            return redirect()->back()->with('error','something went Wrong !!! try agian');
        }
    }


    public function assignRole()
    {
        return view('admin.assignRole')->with('users',User::all())->with('roles',Role::all());
    }

    public function addRole(Request $request)
    {
            $user = User::findOrfail($request->userid);
            $user->roles()->detach();
            $user->roles()->attach($request->roleid); // here sync can alse be use inplace of attach

            return back()->with('message','Role Updated');
    }

    public function edit($id)
    {
        $role = Role::findOrfail($id);
        return view('admin.editform',compact('role'));
    }

    public function update($id, Request $request)
    {

        $updaterole = Role::where('id',$id)->update(['name'=> $request->name]);
        if($updaterole)
        {
            return redirect()->route('roles-list')->with('message','Role Updated Successfully');
        }
        else{
            return redirect()->route('roles-list')->with('error','Role Updated Failed');
        }
    }

    public function destroy($id) {

        $delete =Role::destroy($id);

        if($delete)
        {
            return redirect()->route('roles-list')->with('message','role deleted successfully');
        }
        else{
            return redirect()->route('roles-list')->with('error','Role did not delete');
        }
    }


}
