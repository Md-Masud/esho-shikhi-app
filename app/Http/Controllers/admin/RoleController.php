<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Role\StoreRoleRequest;
use App\Http\Requests\Admin\Role\UpdateRoleRequest;
use App\Repository\Backend\ModuleRepository;
use App\Repository\Backend\RoleRepository;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    private $roleRepository;
    private $moduleRepository;
   public  function __construct(RoleRepository $roleRepository,ModuleRepository $moduleRepository)
   {
       $this->roleRepository=$roleRepository;
       $this->moduleRepository=$moduleRepository;

   }

    public function index()
    {
        Gate::authorize('admin.roles.index');
        $roles=$this->roleRepository->getRoleOfIndex();
        return view ('admin.Roles.index',compact('roles'));
    }

    public function create()
    {

        $rol=Gate::authorize('admin.roles.create');
      $modules=$this->moduleRepository->getModuleIndex();
      return view ('admin.Roles.form',compact('modules','rol'));

    }



    public function store(StoreRoleRequest $storeRoleRequest)
    {
        try {
            $this->roleRepository->createRole($storeRoleRequest);
            $this->setSuccessMessage('Role Successfully Saved');
            return redirect()->back();
        } catch (Exception $e) {
            $this->setErrorMessage($e->getMessage());
        }
    }

    public function edit($id)
    {
        Gate::authorize('admin.roles.edit');
        $modules=$this->moduleRepository->getModuleIndex();
        $role=$this->roleRepository->getRoleId($id);
        return view ('admin.Roles.form',compact('role','modules'));
    }

    public function update($id,UpdateRoleRequest $updateRoleRequest)
    {
        try {
        $this->roleRepository->updateRole($id,$updateRoleRequest);
        $this->setSuccessMessage('Role Successfully edit');
        return redirect()->back();
     } catch (Exception $e) {
        $this->setErrorMessage($e->getMessage());
     }

    }


    public function destroy($id)
    {
      Gate::authorize('admin.roles.destroy');
        try {
            $this->roleRepository->deleteRole($id);
            $this->setSuccessMessage('Role Successfully  delete');
            return redirect()->back();
        } catch (Exception $e) {
            $this->setErrorMessage($e->getMessage());
        }

    }
}
