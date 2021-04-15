<?php


namespace App\Repository\User;


use App\Models\CourseEnroll;
use App\Models\UserEnroll;
use Illuminate\Support\Facades\Auth;

class UserEnrollReRepository
{
    public  function getPostOfIndex()
    {
        return $course=Auth::user()->userEnrolls()->get();
    }
    public  function  createUserEnroll($request)
    {

          $userEnroll=UserEnroll::create([
            'user_id'=>Auth::id(),
            'category_id'=>$request->category_id,
          ]);
          return $userEnroll;
    }

}
