<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use DB;
use Hash;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    public function __construct()
    {
    }

    public function index(Request $request)
    {
        $users = User::orderBy('id', 'DESC')->paginate(config('admin.perPage'));

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        User::create($input);

        $notification = [
            'msg' => 'User created successfully',
            'status' => 1,
        ];

        return redirect()->route('user-management.index')
                        ->with($notification);
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
        ]);

        $input = $request->all();
        $user = User::find($id);
        $user->update($input);

        $notification = [
            'msg' => 'User updated successfully',
            'status' => 1,
        ];

        return redirect()->route('user-management.index')
                        ->with($notification);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        $notification = [
            'msg' => 'Account deleted successfully',
            'status' => 1,
        ];

        return redirect()->route('user-management.index')
                        ->with($notification);
    }
}
