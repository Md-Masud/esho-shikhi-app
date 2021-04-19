<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\UserEnroll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $data['post']=Auth::user()->posts()->count();
        $data['course']=Auth::user()->categories()->count();
        $data['posts']=Auth::user()->posts()->where('is_approved',0)->count();
        $students=UserEnroll::all();
        $user_id=Auth::id();
        return view ('teacher.dashboard',$data,compact('students','user_id'));
    }

}
