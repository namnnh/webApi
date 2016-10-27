<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Interfaces\RoleRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests;

class UserController extends Controller
{
    protected $userRepository;
    protected $roleRepository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index(RoleRepositoryInterface $roleRepository,$role = 'total'){
        $users = $this->userRepository->getUsersWithRole(config('app.nbrPages.back.users'), $role);
        $counts = $this->userRepository->counts();
        $roles = $roleRepository->all();

        return view('back.users.index', compact('users', 'counts', 'roles'));
    }
}
