<?php
namespace App\Repositories\Interfaces;

interface UserRepositoryInterface
{
    // public function save();
    public function getUsersWithRole($n,$role);
    // public function count();
    public function counts();
    // public function store();
    // public function update();
    // public function valid();
    // public function destroyUser();
    // public function confirm();
    // public function getBlogAuthorReport();
}