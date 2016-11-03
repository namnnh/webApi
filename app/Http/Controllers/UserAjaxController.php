<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\Interfaces\UserRepositoryInterface;
use APp\Models\User;

class UserAjaxController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
        $this->middleware('ajax');
    }

    public function updateSeen(Request $request, User $user){
        $this->userRepository->update($request->all(),$user);
        return response()->json();
    }
}
