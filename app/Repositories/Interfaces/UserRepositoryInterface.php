<?php
namespace App\Repositories\Interfaces;
use App\Models\User;

interface UserRepositoryInterface
{
    // public function save();
    public function getUsersWithRole($n,$role);
    // public function count();
    public function counts();
    public function store($inputs,$confirmation_code = null);
    public function update($inputs,$user);
    // public function valid();
    public function destroyUser(User $user);
    // public function confirm();
    public function getBlogAuthorReport();
}