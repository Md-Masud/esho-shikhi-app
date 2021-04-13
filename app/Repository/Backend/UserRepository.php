<?php


namespace App\Repository\Backend;


use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    public  function getRoleOfIndex()
    {
        return $users=User::all();
    }
    public  function  createUser($request)
    {
        return $role=User::create([
            'role_id' => $request->role,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => $request->filled('status'),
        ]);
    }
    public  function  getUserId($id)
    {
        return $user=User::find($id);
    }
    public function  updateUser($id,$request)
    {
        return $user=User::where('id',$id)->update([
            'role_id' => $request->role,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => $request->filled('status'),
        ]);
    }
    public  function  deleteUser($id)
    {
        return $this->getUserId($id)->delete();
    }
}
