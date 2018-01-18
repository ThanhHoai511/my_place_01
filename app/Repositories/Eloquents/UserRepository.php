<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function all()
    {
        return User::all();
    }

    public function search($key)
    {
        return User::where('name', 'like', '%' . $key . '%')
            ->get();
    }

    public function find($id)
    {
        return User::find($id);
    }

    public function paginate()
    {
        return User::paginate(config('paginate.paginateuser'));
    }

    public function update(array $input, $id)
    {
        $user = User::find($id);
        $user->name = $input['name'];
        $user->password = $input['password'];
        $user->email = $input['email'];
        $user->add = $input['add'];
        $user->phone = $input['phone'];
        $user->avatar = $input['avatar'];
        $user->phone = $input['phone'];
        $user->save();
    }
    
    public function register(array $input)
    {
        $user = new User;
        $user->name = $input['name'];
        $user->password = $input['password'];
        $user->email = $input['email'];
        $user->dateofbirth = $input['birthday'];
        $user->add = $input['add'];
        $user->level = $input['level'];
        $user->avatar = $input['avatar'];
        $user->phone = $input['phone'];
        $user->save();
    }
    public function delete($id)
    {
        return User::destroy($id);
    }

    public function updateavatar($id)
    {
        $user = User::find($id);
        
        return $user->avatar;
    }
}
