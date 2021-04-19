<?php


namespace App\Repository\Backend;


use App\Models\User;
use Illuminate\Support\Facades\Auth;
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

        $user=User::where('id',$id)->select('id','password')->first();
        return $user=User::where('id',$id)->update([
            'role_id' => $request->role,
            'name' => $request->name,
            'email' => $request->email,
            'password' => isset($request->password) ? Hash::make($request->password) : $user->password,
            'status' => $request->filled('status'),
            'about'=>$request->about,
        ]);


    }
    public  function  deleteUser($id)
    {
        return $this->getUserId($id)->delete();
    }
    public function  profileUser()
    {
        return $user=Auth::user();
    }
}
