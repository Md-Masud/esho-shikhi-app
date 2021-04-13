<?php
namespace App\Repository\Backend;
use App\Models\Role;
use Illuminate\Support\Str;

class RoleRepository
{
    public  function getRoleOfIndex()
    {
       return $roles=Role::all();
    }
    public  function  createRole($request)
    {
       return $role=Role::create([
            'name' => $request->name,
            'slug' =>Str::slug($request->name),
        ])->permissions()->sync($request->input('permissions', []));
    }
    public  function  getRoleId($id)
    {
        return $roleId=$role=Role::find($id);
    }
    public function  updateRole($id,$request)
    {

           $role= Role::find($id);
           $role->name=$request->name;
           $role->slug= Str::slug($request->name);
           $role->save();
           return $role->permissions()->sync($request->input('permissions', []));
    }
    public  function  deleteRole($id)
    {
        return $this->getRoleId($id)->delete();
    }
}
