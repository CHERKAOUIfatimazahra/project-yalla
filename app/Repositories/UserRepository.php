<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{
    public function all()
    {
        return User::latest()->paginate(5);
    }

    public function update(User $user, array $data)
    {
        $user->name = $data['name'];
        $user->email = $data['email'];

        if (isset($data['image'])) {
            $image = $data['image'];
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $user->image = $imageName;
        }

        if (isset($data['new_password'])) {
            $user->password = Hash::make($data['new_password']);
        }

        $user->save();

        return $user;
    }
    public function delete(User $user)
    {
        return $user->delete();
    }
}
