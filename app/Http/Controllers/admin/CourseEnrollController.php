<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Repository\Backend\CategoryRepository;
use App\Repository\Backend\CourseEnrollRepository;
use Illuminate\Http\Request;

class CourseEnrollController extends Controller
{
    private $courseEnrollController,$categoryRepository;
    public function  __construct( CourseEnrollRepository $courseEnrollController,CategoryRepository $categoryRepository)
    {
        $this->courseEnrollController=$courseEnrollController;
        $this->categoryRepository=$categoryRepository;
    }
    public function index()
    {
        $courseEnrollControllers=$this->courseEnrollController->getCourseEnrollOfIndex();
        return view('admin.CourseEnroll.index' ,compact('courseEnrollControllers'));
    }

    public function create()
    {
       $categories=$this->categoryRepository->getCategoryOfIndex();
        return view ('admin.CourseEnroll.create',compact('categories'));

    }



    public function store(Request $request)
    {
        try {
            $this->courseEnrollController->createCourseEnroll($request);
            $this->setSuccessMessage('Enroll Successfully Saved');
            return redirect()->back();
        } catch (Exception $e) {
            $this->setErrorMessage($e->getMessage());
        }
    }

    public function edit($id)
    {
        $categories=$this->categoryRepository->getCategoryOfIndex();
        $courseEnroll=$this->courseEnrollController->getCourseEnroll($id);
        return view ('admin.CourseEnroll.edit',compact('courseEnroll','categories'));
    }

    public function update($id,Request $request)
    {
        try {
            $this->courseEnrollController->updateCourseEnroll($id,$request);
            $this->setSuccessMessage('CourseEnroll Successfully edit');
            return redirect()->back();
        } catch (Exception $e) {
            $this->setErrorMessage($e->getMessage());
        }

    }


    public function destroy($id)
    {
        try {
            $this->courseEnrollController->deleteCourseEnroll($id);
            $this->setSuccessMessage('CourseEnroll Successfully  delete');
            return redirect()->back();
        } catch (Exception $e) {
            $this->setErrorMessage($e->getMessage());
        }

    }
}
