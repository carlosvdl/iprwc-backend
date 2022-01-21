<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function register(User $user, array $data) : User
    {
        $user->fill($data);
        $user->password = Hash::make($data['password']);
        $user->save();

        return $user;
    }
}
