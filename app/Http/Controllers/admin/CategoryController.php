<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreCategoryRequest;
use App\Http\Requests\Admin\Category\UpdateCategoryRequest;
use App\Repository\Backend\CategoryRepository;
use App\Repository\Backend\UserRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categoryRepository,$userRepository;
    public  function __construct(CategoryRepository $categoryRepository,UserRepository $userRepository)
    {
        $this->categoryRepository=$categoryRepository;
        $this->userRepository=$userRepository;

    }

    public function index()
    {
        $categories=$this->categoryRepository->getCategoryOfIndex();
        return view ('admin.category.index',compact('categories'));
    }

    public function create()
    {
        $users=$this->userRepository->getRoleOfIndex();

     return view ('admin.category.create',compact('users'));

    }



    public function store(StoreCategoryRequest $storeCategoryRequest)
    {
        try {
            $this->categoryRepository->createCategory($storeCategoryRequest);
            $this->setSuccessMessage('Course Successfully Saved');
            return redirect()->back();
        } catch (Exception $e) {
            $this->setErrorMessage($e->getMessage());
        }
    }

    public function edit($id)
   {
       $users=$this->userRepository->getRoleOfIndex();
        $course=$this->categoryRepository->getCategory($id);
        return view ('admin.category.create',compact('course','users'));
    }

    public function update($id,UpdateCategoryRequest $categoryRequest)
    {
        try {
            $this->categoryRepository->updateCategory($id,$categoryRequest);
            $this->setSuccessMessage('Course Successfully edit');
            return redirect()->back();
        } catch (Exception $e) {
            $this->setErrorMessage($e->getMessage());
        }

    }


    public function destroy($id)
    {

        try {
            $this->categoryRepository->deleteCategory($id);
            $this->setSuccessMessage('Course Successfully  delete');
            return redirect()->back();
        } catch (Exception $e) {
            $this->setErrorMessage($e->getMessage());
        }

    }
}
