<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UpdateUserController extends Controller
{
    public function updateRoles(User $user)
    {
        request()->validate([
            "name" => "required",
            "email" => "required|unique:users,email,{$user->id}",
            "roles" => "array|required"
        ]);
        $user->syncRoles(request("roles"));
        return redirect()->to(route("RoleUser"))->with("success", "Success Sync Roles to \"{$user->name}\"");
    }
}
