<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::select('id', 'name', 'email', 'email_verified_at', 'created_at', 'updated_at', 'status')->get();
        return view('admin.users.index', compact('users'));
    }
    public function update(Request $request)
    {
        $user = User::findorFail($request->id);
        $user->status = $request->status;
        $user->save();
        return redirect('/admin/users')->with('success', 'Successfully update user.');
    }
    public function show($id)
    {
        $user = User::findorFail($id);
        return view('admin.users.edit', compact('user'));
    }
    public function delete($id)
    {
        $user = User::findorFail($id);
        $user->delete();
        
        return redirect()->back()->with('success', 'Successfully delete user.');
    }
}
