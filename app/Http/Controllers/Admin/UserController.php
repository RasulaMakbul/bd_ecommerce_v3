<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'DESC')->paginate(15);
        return view('admin.users.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('admin.users.show', compact('user'));
    }
    public function user($id)
    {
        // dd($id);
        $user = User::find($id);
        $user->role_as = 0;
        $user->update();
        return back();
    }
    public function admin($id)
    {
        // dd($id);
        $user = User::find($id);
        $user->role_as = 1;
        $user->update();
        return back();
    }
}
