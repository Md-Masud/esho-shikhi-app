<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CourseEnroll\CourseEnrollCreateRequest;
use App\Http\Requests\Admin\CourseEnroll\CourseEnrollUpdate;
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



    public function store(CourseEnrollCreateRequest $courseEnrollCreateRequest)
    {
        try {
            $this->courseEnrollController->createCourseEnroll($courseEnrollCreateRequest);
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

    public function update($id,CourseEnrollUpdate $courseEnrollUpdate)
    {
        try {
            $this->courseEnrollController->updateCourseEnroll($id,$courseEnrollUpdate);
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
