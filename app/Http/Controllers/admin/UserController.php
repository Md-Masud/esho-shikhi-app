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
    public function  adminProfileView()
    {
        $user=$this->userRepository->profileUser();

        return view('admin.profile',compact('user'));
    }
    public  function adminProfileEdit($id)
    {
        $user=$this->userRepository->getUserId($id);
        return view('admin.profile_edit',compact('user'));
    }
    public  function  adminProfileUpdate($id, Request $request)
    {
        try {
            $this->userRepository->updateUser($id, $request);
            $this->setSuccessMessage('admin Successfully Update');
            return redirect()->route('admin.profile');
        } catch (Exception $e) {
            $this->setErrorMessage($e->getMessage());
        }

    }
    public function  teacherProfileView()
    {
        $user=$this->userRepository->profileUser();

        return view('teacher.profile',compact('user'));
    }
    public  function teacherProfileEdit($id)
    {

        $user=$this->userRepository->getUserId($id);
        return view('teacher.profile_edit',compact('user'));
    }
    public  function  teacherProfileUpdate($id, Request $request)
    {
        try {
            $this->userRepository->updateUser($id,$request);

            $this->setSuccessMessage('Teacher Successfully Update');
            return redirect()->route('teacher.profile');
        } catch (Exception $e) {
            $this->setErrorMessage($e->getMessage());
        }

    }
    public function  userProfileView()
    {
        $user=$this->userRepository->profileUser();

        return view('user.profile',compact('user'));
    }
    public  function userProfileEdit($id)
    {
        $user=$this->userRepository->getUserId($id);
        return view('user.profile_edit',compact('user'));
    }
    public  function  userProfileUpdate($id, Request $request)
    {
        try {
            $this->userRepository->updateUser($id,$request);
            $this->setSuccessMessage('User Successfully Update');
            return redirect()->route('user.profile');
        } catch (Exception $e) {
            $this->setErrorMessage($e->getMessage());
        }

    }


}
