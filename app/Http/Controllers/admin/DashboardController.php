<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use App\Models\UserEnroll;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        $data['usersCount'] = User::count();
        $data['rolesCount'] = Role::count();
        $post=Post::where('is_approved',0)->count();
        $data['videoCount']= Post::count();
        $data['category'] = Category::count();
        $data['user'] =User::where('role_id',2)->count();
        $data['users'] =User::where('role_id',2)->take(10)->get();
        $data['teacher'] =User::where('role_id',5)->count();
        $data['teachers'] =User::where('role_id',5)->take(10)->get();
        $data['enroll']=UserEnroll::count();
//        $data['users'] = User::orderBy('last_login_at','desc')->take(10)->get();
        return view ('admin.dashboard',$data,compact('post',));
    }
}
