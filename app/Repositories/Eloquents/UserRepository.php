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
}