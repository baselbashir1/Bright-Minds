<?php

namespace App\Http\Repositories;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{

    public function getAllUsers()
    {
        return User::all();
    }

    public function getUserById($id)
    {
        return User::find($id);
    }

    public function createUser(array $data)
    {
        return User::create($data);
    }

    public function updateUser(array $data, $id)
    {
        return User::find($id)->update($data);
    }

    public function deleteUser($id)
    {
        return User::find($id)->delete;
    }
}
