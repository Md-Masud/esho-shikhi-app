<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Repository\Backend\CategoryRepository;
use App\Repository\Teacher\PostRepository;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private $postRepository,$categoryRepository;
    public function  __construct(PostRepository $postRepository,CategoryRepository $categoryRepository)
    {
       $this->postRepository=$postRepository;
       $this->categoryRepository=$categoryRepository;
    }
    public function  index()
    {
        $posts=$this->postRepository->getPostOfIndex();
        return view('index',compact('posts'));
    }
    public  function  show($id)
    {
        $categories=$this->categoryRepository->viewCategory($id);
        return view('showindex',compact('categories'));
    }
    public function  courseShow()
    {
        $courses=$this->categoryRepository->getCategoryOfIndex();
        return  view('course',compact('courses'));
    }
    public function courseDetails($id)
    {
        $course=$this->categoryRepository->getCategory($id);
        return view('viewCourse',compact('course'));
    }
}
