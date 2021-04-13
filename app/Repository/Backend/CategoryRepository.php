<?php


namespace App\Repository\Backend;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CategoryRepository
{
    public  function getCategoryOfIndex()
    {
        return $category=Category::all();
    }
    public  function  createCategory($request)
    {
          $category= new Category();

            $category->name = $request->name;
            $category->slug=Str::slug($request->name);
            if(isset($request->status))
             {
                $category->status = true;
             }
            else {
                  $category->satus= false;
            }
        if($request->file('picture'))
        {
            $file=$request->file('picture');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->picture->move('uploads/picture/',$filename);
            $category->picture=$filename;
        }
        $category->body= $request->body;
        $category->course_free=$request->course_free;
        $category->user()->associate($request->user_id);
            $category->save();
            return $category;
    }
    public  function  getCategory($id)
    {
        return $category=Category::find($id);
    }
    public function  updateCategory($id,$request)
    {

        $category= Category::find($id);

        $category->name = $request->name;
        $category->slug=Str::slug($request->name);
        if(isset($request->status))
        {
            $category->status = true;
        }
        else {
            $category->satus= false;
        }
        if($request->file('picture'))
        {
            $file=$request->file('picture');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->picture->move('uploads/picture/',$filename);
            $category->picture=$filename;
        }
        $category->body= $request->body;
        $category->course_free=$request->course_free;
        $category->user()->associate($request->user_id);
        $category->save();
        return $category;

    }
    public  function  deleteCategory($id)
    {
        return $this->getCategory($id)->delete();
    }
    public  function  viewCategory($id)
    {
       return $category=Category::with('posts')->find($id);
    }
    public  function  authenticateCourse()
    {
        return $category=Auth::user()->categories()->get();
    }

}
