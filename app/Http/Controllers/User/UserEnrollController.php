<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Repository\Backend\CategoryRepository;
use App\Repository\Backend\CourseEnrollRepository;
use App\Repository\Backend\UserRepository;
use App\Repository\User\UserEnrollReRepository;
use Illuminate\Http\Request;

class UserEnrollController extends Controller
{

    private $categoryRepository,$userEnrollReRepository,$courseEnrollRepository;
    public  function __construct(CategoryRepository $categoryRepository,UserEnrollReRepository $userEnrollReRepository,CourseEnrollRepository $courseEnrollRepository)
    {
        $this->categoryRepository=$categoryRepository;
        $this->userEnrollReRepository=$userEnrollReRepository;
        $this->courseEnrollRepository=$courseEnrollRepository;

    }
    public  function  index()
    {
        $myCourse=$this->userEnrollReRepository->getPostOfIndex();
       return view('user.my_course',compact('myCourse'));

    }

    public function show($id)
    {
        $course=$this->categoryRepository->getCategory($id);
        return view ('user_enroll_key',compact('course'));
    }

    public function store(Request $request)
    {
         $courseCode=$this->courseEnrollRepository->getCourseEnrollOfIndex();
         foreach ($courseCode as $code)
         {
             $codeEnroll=$code->password;
         }
         if($codeEnroll==$request->enroll_key)
         {
             try {
                 $this->userEnrollReRepository->createUserEnroll($request);
                 $this->setSuccessMessage('Enroll Successfully Saved');
                 return redirect()->back();
             } catch (Exception $e) {
                 $this->setErrorMessage($e->getMessage());
             }

         }
         else{
             $this->setErrorMessage('invalide code');
             return redirect()->back();

         }

    }

    public function courseView($id)
    {

        $course=$this->categoryRepository->viewCategory($id);
        return view ('user.course_view',compact('course'));
    }

//    public function update($id,UpdateCategoryRequest $categoryRequest)
//    {
//        try {
//            $this->categoryRepository->updateCategory($id,$categoryRequest);
//            $this->setSuccessMessage('Course Successfully edit');
//            return redirect()->back();
//        } catch (Exception $e) {
//            $this->setErrorMessage($e->getMessage());
//        }
//
//    }
//
//
//    public function destroy($id)
//    {
//
//        try {
//            $this->categoryRepository->deleteCategory($id);
//            $this->setSuccessMessage('Course Successfully  delete');
//            return redirect()->back();
//        } catch (Exception $e) {
//            $this->setErrorMessage($e->getMessage());
//        }
//
//    }
}
