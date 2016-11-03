<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Models\User;
use App\Models\Role;

class UserRepository implements UserRepositoryInterface
{
    protected $role;
    protected $user;

    public function __construct(User $user, Role $role)
    {
        $this->model = $user;
        $this->role = $role;
    }
    protected function save($user, $inputs)
    {
        if (isset($inputs['seen'])) {
            $user->seen = $inputs['seen'] == 'true';
        } else {
            $user->username = $inputs['username'];
            $user->email = $inputs['email'];

            if (isset($inputs['role'])) {
                $user->role_id = $inputs['role'];
            } else {
                $role_user = $this->role->whereSlug('user')->first();
                $user->role_id = $role_user->id;
            }
        }

        $user->save();
    }

    public function getUsersWithRole($n,$role)
    {
        $query = $this->model->with('role')->oldest('seen')->latest();
        if ($role != 'total') {
            $query->whereHas('role', function ($q) use ($role) {
                $q->whereSlug($role);
            });
        }
        return $query->paginate($n);
    }

    public function counts()
    {
        $counts = [
            'admin' => $this->count('admin'),
            'redac' => $this->count('redac'),
            'user' => $this->count('user')
        ];

        $counts['total'] = array_sum($counts);
        return $counts;
    }

    public function count($role = null)
    {
        if ($role) {
            return $this->model
                ->whereHas('role', function ($q) use ($role) {
                    $q->where('slug',$role);
                })->count();
        }

        return $this->model->count();
    }

    public function update($inputs,$user)
    {
       $user->confirmed = isset($inputs['confirmed']);
       $this->save($user, $inputs);
    }

    public function destroyUser(User $user)
    {
        $user->comments()->delete();

        $posts = $user->posts()->get();

        foreach ($posts as $post) {
            $post->tags()->detach();
            $post->delete();
        }
        
        $user->delete();
    }

    public function store($inputs,$confirmation_code = null)
    {
        $this->model->password = bcrypt($inputs['password']);

        if ($confirmation_code) {
            $this->model->confirmation_code = $confirmation_code;
        } else {
            $this->model->confirmed = true;
        }

        $this->save($this->model, $inputs);

        return $this->model;
    }
}