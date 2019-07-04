<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Redirect, DB;

class AdminController extends Controller
{
    public function index(){
        // return view('admin.companies.index');
        return view('admin.layout.index');
    }
    public function showpost($id){
        $info = Post::findOrfail($id);
        return view('admin.module.post.showpost',compact('info'));
    }
}
