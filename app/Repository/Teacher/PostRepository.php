<?php


namespace App\Repository\Teacher;


use App\Models\Post;
use App\Repository\File\videoFIle;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class PostRepository extends videoFIle
{
    public  function getPostOfIndex()
    {
      $user_id=Auth::id();
      return $posts=Post::where('user_id',$user_id)->get();
    }
    public  function  createPost($request)
    {
        $post = new Post();
        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        if($request->file('video'))
        {
            $file=$request->file('video');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->video->move('uploads/images/',$filename);
            $post->video=$filename;
        }
        $post->body = $request->body;
        if(isset($request->is_approved))
        {
            $post->is_approved = true;
        }else {
            $post-> is_approved= false;
        }
        $post->category()->associate($request->category_id);
        $post->save();
        return $post;
    }
    public  function  getPostId($id)
    {
        return $post=post::find($id);
    }
    public function  updatePost($id,$request)
    {
        $post =Post::find($id);
        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        if($request->file('video'))
        {
            $file=$request->file('video');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->video->move('uploads/images/',$filename);
            $post->video=$filename;
        }
        $post->body = $request->body;
        if(isset($request->is_approved))
        {
            $post->is_approved = true;
        }else {
            $post-> is_approved= false;
        }
        $post->category()->associate($request->category_id);
        $post->save();
        return $post;
    }
    public  function  deletePost($id)
    {
        return $this->getPostId($id)->delete();
    }
    public  function PostOfIndex()
    {

        return $posts=Post::all();
    }
}
