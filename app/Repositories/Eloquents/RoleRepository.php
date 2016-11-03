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
    public function update($inputs)
    {
          foreach ($inputs as $key => $value) {
            $role = $this->role->whereSlug($key)->first();
            if(!is_null($role)){
                $role->title = $value;
                $role->save();
            }
         }
    }
}