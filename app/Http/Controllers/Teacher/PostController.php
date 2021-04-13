<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\UpdateCategoryRequest;
use App\Http\Requests\Teacher\Post\StorePostRequest;
use App\Http\Requests\Teacher\Post\UpdatePostRequset;
use App\Repository\Backend\CategoryRepository;
use App\Repository\Teacher\PostRepository;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private $postRepository,$categoryRepository;
    public function  __construct( PostRepository $postRepository,CategoryRepository $categoryRepository)
    {
        $this->postRepository=$postRepository;
        $this->categoryRepository=$categoryRepository;
    }
    public function index()
    {
        $posts=$this->postRepository->getPostOfIndex();
        return view ('teacher.post.index',compact('posts'));
    }

    public function create()
    {
        $categories=$this->categoryRepository->authenticateCourse();
        return view('teacher.post.create',compact('categories'));
    }


    public function store(StorePostRequest $storePostRequest)
    {
        try {
            $this->postRepository->createPost($storePostRequest);
            $this->setSuccessMessage('post Successfully Saved');
            return redirect()->back();
        } catch (Exception $e) {
            $this->setErrorMessage($e->getMessage());
        }
    }


    public function show($id)
    {
        $post=$this->postRepository->getPostId($id);
        return view('teacher.post.show',compact('post'));
    }

    public function edit($id)
    {
        $categories=$this->categoryRepository->getCategoryOfIndex();
        $post=$this->postRepository->getPostId($id);
        return view('teacher.post.edit',compact('post','categories'));
    }


    public function update( UpdatePostRequset $updatePostRequset, $id)
    {
        try {
            $this->postRepository->updatePost($id,$updatePostRequset);
            $this->setSuccessMessage('post Successfully Update ');
            return redirect()->back();
        } catch (Exception $e) {
            $this->setErrorMessage($e->getMessage());
        }
    }


    public function destroy($id)
    {
        try {
            $this->postRepository->deletePost($id);
            $this->setSuccessMessage('post Successfully delete');
            return redirect()->back();
        } catch (Exception $e) {
            $this->setErrorMessage($e->getMessage());
        }
    }
}
