<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function show()
    {
        return view('pages.register');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'shop_name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'personal_contact' => 'required',
            'shop_contact' => 'required',
            'password' => 'required'
        ]);

        $data = $request->all();
        $query = User::create([

            'name' => $data['name'],
            'shop_name' => $data['shop_name'],
            'email' => $data['email'],
            'address' => $data['address'],
            'personal_contact' => $data['personal_contact'],
            'shop_contact' => $data['shop_contact'],
            'password' => bcrypt($data['password']),
        ]);
        // $query = User::create($data);
        $role = Role::where(['name' => 'client'])->first();
        $query->assignRole($role);
        if ($query) {
            return redirect()->back()->with('message', 'Data added Successfully');
        } else {
            return redirect()->back()->with('error', 'something went wrong!!!');
        }
    }

    public function checkuser(Request $request)
    {
        $data = $request->validate([
            'email' => 'required:unique',
            'password' => 'required'
        ]);

        if (Auth::attempt($data)) {
            $role = Auth::user()->role;
            if ($role == 'admin'); {
                $request->session()->regenerate();
                return redirect()->route('home');
            }
        }
        return redirect()->to('/');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
