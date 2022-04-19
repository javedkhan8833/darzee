<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class UserManagementController extends Controller
{
    public function index()
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
