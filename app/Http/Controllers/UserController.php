<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view("users.index");
    }

    public function create()
    {
        $user = User::make();
        return view("users.edit", ["user" => $user]);
    }

    public function edit(User $user)
    {
        return view("users.edit", ["user" => $user]);
    }

    public function createToken($userId)
    {
        $user = User::findOrFail($userId);
        $token = $user->createToken($user->email);
        session()->flash("message", "Copy token: " . $token->plainTextToken);
        return redirect()->back();
    }
}
