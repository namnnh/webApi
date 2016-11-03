<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\Interfaces\RoleRepositoryInterface;
use App\Http\Requests\RoleRequest;

class RoleController extends Controller
{
    protected $roleRepository;

    public function __construct(RoleRepositoryInterface $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function index()
    {
        $roles = $this->roleRepository->all();
        return view('back.users.roles',compact('roles'));
    }

    public function update(RoleRequest $request)
    {
        $this->roleRepository->update($request->except('_token'));
        return back()->with('ok',trans('back/role.ok'));     
    }
}
