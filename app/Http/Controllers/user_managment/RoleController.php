<?php

namespace App\Http\Controllers\user_managment;

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
            'name'=>'required',
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
}
