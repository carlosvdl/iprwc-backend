<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function update(array $data) : void
    {
        $this->save(auth()->user(), $data);
    }

    private function save(User $user, array $data) : void
    {
        $filteredData = array_filter($data, function($value) { return $value !== null; });
        $user->fill($filteredData);

        if (isset($data['password'])) {
            $user->password = Hash::make($data['password']);
        }

        $user->save();
    }
}
