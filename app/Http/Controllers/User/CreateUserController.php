<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CreateUserController extends Controller
{
    public function index()
    {
        return view("Permission/user/create", []);
    }
    public function store_and_roles()
    {
        $attr =      request()->validate([
            "name" => "required",
            "email" => ['required', "email", "unique:users,email"],
            "roles" => "array|required"
        ]);
        $user = User::create([
            'name' => data_get($attr, "name"),
            'email' => data_get($attr, "email"),
            'password' => password_hash('root', PASSWORD_DEFAULT),
        ]);
        $user->assignRole(request("roles"));
        return back()->with("success", "success add Role to {$user->name}");
    }
}
