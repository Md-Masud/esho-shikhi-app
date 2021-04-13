<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repository\Backend\RoleRepository;
use App\Repository\Backend\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private  $roleRepository;
    private $userRepository;
    public  function __construct(RoleRepository $roleRepository,UserRepository $userRepository)
    {
        $this->roleRepository=$roleRepository;
        $this->userRepository=$userRepository;

    }

    public function index()
    {
        $users=$this->userRepository->getRoleOfIndex();
        return view('admin.users.index',compact('users'));
    }


    public function create()
    {
        $roles=$this->roleRepository->getRoleOfIndex();
        return view('admin.users.form',compact('roles'));
    }

    public function store(Request $request)
    {
        try {
            $this->userRepository->createUser($request);
            $this->setSuccessMessage('User Successfully Saved');
            return redirect()->back();
        } catch (Exception $e) {
            $this->setErrorMessage($e->getMessage());
        }
    }


    public function show($id)
    {

        $user=$this->userRepository->getUserId($id);
        return view('admin.users.show',compact('user'));
    }

    public function edit($id)
    {
        $user=$this->userRepository->getUserId($id);
        $roles=$this->roleRepository->getRoleOfIndex();
        return view('admin.users.form',compact('user','roles'));
    }


    public function update(Request $request, $id)
    {
        try {
            $this->userRepository->updateUser($id,$request);
            $this->setSuccessMessage('User Successfully Saved');
            return redirect()->back();
        } catch (Exception $e) {
            $this->setErrorMessage($e->getMessage());
        }
    }

    public function destroy($id)
    {

        try {
           $this->userRepository->deleteUser($id);
            $this->setSuccessMessage('User Successfully  delete');
            return redirect()->back();
        } catch (Exception $e) {
            $this->setErrorMessage($e->getMessage());
        }
    }
}
