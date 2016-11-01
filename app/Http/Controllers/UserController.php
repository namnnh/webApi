<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Interfaces\RoleRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;

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

    public function show(User $user)
    {
        return view('back.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('back.users.edit', compact('user'));
    }
     public function update(UserUpdateRequest $request, User $user){
         dd($request->all());
     }
     public function destroy(User $user)
    {
       // $this->userRepository->destroyUser($user);

        return redirect('user/list')->with('ok', trans('back/users.destroyed'));
    }
}
