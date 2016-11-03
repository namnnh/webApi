<?php
namespace App\Repositories\Interfaces;

interface RoleRepositoryInterface
{
    public function all();
    public function allSelect();
    public function update($inputs);
}