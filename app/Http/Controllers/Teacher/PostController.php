<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\UpdateCategoryRequest;
use App\Http\Requests\Teacher\Post\StorePostRequest;
use App\Http\Requests\Teacher\Post\UpdatePostRequset;
use App\Notifications\NewPostNotify;
use App\Repository\Backend\CategoryRepository;
use App\Repository\SubscriberRepository;
use App\Repository\Teacher\PostRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class PostController extends Controller
{
    private $postRepository,$categoryRepository,$subscriberRepository;
    public function  __construct( PostRepository $postRepository,CategoryRepository $categoryRepository,SubscriberRepository $subscriberRepository)
    {
        $this->postRepository=$postRepository;
        $this->categoryRepository=$categoryRepository;
        $this->subscriberRepository=$subscriberRepository;
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
            $post=$this->postRepository->createPost($storePostRequest);
            $subscribers =$this->subscriberRepository->getSubscriberOfIndex();
            if($post->is_approved == true) {


                foreach ($subscribers as $subscriber) {
                    Notification::route('mail', $subscriber->email)
                        ->notify(new NewPostNotify($post));
                }
            }
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
