<?php 
namespace App\Repositories\Eloquents;
use App\Repositories\Interfaces\RoleRepositoryInterface;
use App\Models\Role;

class RoleRepository implements RoleRepositoryInterface
{
    protected $role;
    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    public function all()
    {
        return $this->role->all();
    }
    public function allSelect()
    {
         $select = $this->all()->pluck('title', 'id');

        return compact('select');
    }
}