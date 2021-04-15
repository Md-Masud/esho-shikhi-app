<?php


namespace App\Repository\Backend;
use App\Models\CourseEnroll;

class CourseEnrollRepository
{
    public  function getCourseEnrollOfIndex()
    {
        return $courseEnrollController= CourseEnroll::all();
    }
    public  function  createCourseEnroll($request)
    {
        $courseEnrollController= new CourseEnroll();
        $courseEnrollController->category()->associate($request->category_id);
        $courseEnrollController->password =$request->password;
        $courseEnrollController->save();
        return $courseEnrollController;
    }
    public  function  getCourseEnroll($id)
    {
        return $courseEnrollController=CourseEnroll::find($id);
    }
    public function  updateCourseEnroll($id,$request)
    {
        $courseEnrollController=  CourseEnroll::find($id);
        $courseEnrollController->category()->associate($request->category_id);
        $courseEnrollController->password =$request->password;
        $courseEnrollController->save();
        return $courseEnrollController;
    }
    public  function  deleteCourseEnroll($id)
    {
        return $this->getCourseEnroll($id)->delete();
    }


}
