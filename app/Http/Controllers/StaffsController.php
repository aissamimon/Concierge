<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class StaffsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // request()->user()->authorizeRoles(['user', 'admin']);
        $staffs = User::with('roles')->get();
        $roles = Role::all();
        return view('staffs', compact('staffs', 'roles'));
    }

    public function store()
    {
        $attributes = $this->validator(request());

        try {
            $user = User::create($attributes);
            $user->roles()->attach(Role::where('id', $attributes['role_id'])->first());
        } catch (\Exception $e) {
            return back()->withToastError('Whoops, looks like something went wrong!');
        }
        return redirect('/staffs');
    }

    public function destroy($id)
    {
        try {
            $user = User::find($id);
            $user->roles()->detach();
            $user->delete();
        } catch (\Exception $e) {
            return back()->withToastError('Whoops, looks like something went wrong!');
        }
        return redirect('/staffs')->withToastSuccess('Successfully deleted!');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required|string|min:5',
            'username' => 'required|string|unique:users,username',
            'role_id' => 'required',
            'password' => 'required|string|confirmed|min:8'
        ]);

        $attributes['password'] = Hash::make(request()->password);

        return $attributes;
    }
}
