<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CatPost;
use App\Post;
use Redirect,Datetime,DB;

class PostController extends Controller
{
    public function index(){
        $data = DB::table('posts')->join('cat_posts','posts.cat_id','=','cat_posts.id')
        ->select('posts.id','posts.title_post','posts.created_at','posts.updated_at','cat_posts.title_cat')
        ->get();
        return view('admin.module.post.list', compact('data'));
    }
    public function getadd(){
        $cat = CatPost::select('id','title_cat')->get();
        return view('admin.module.post.add',compact('cat'));
    }
    public function posttopost(Request $rq){
        $post = new Post;
        $post->title_post = $rq->txtTitleName;
        $post->slug = str_slug($rq->txtTitleName,'-');
        $post->intro = $rq->txtIntro;
        $post->content = $rq->txtContent;
        $post->cat_id = $rq->sltcat;
        $post->created_at = new Datetime();
        $post->save();
        return Redirect::route('admin.edit.post', $post->id);
    }
    public function getedit($id){
        $cat = CatPost::select('id','title_cat')->get();
        $data = Post::findOrFail($id);
        return view('admin.module.post.edit',compact(['cat','data']));
    }
    public function updatepost(Request $rq,$id){
        $update = Post::findOrFail($id);
        $update->title_post = $rq->txtTitleName;
        $update->slug = str_slug($rq->txtTitleName,'-');
        $update->intro = $rq->txtIntro;
        $update->content = $rq->txtContent;
        $update->cat_id = $rq->sltcat;
        $update->updated_at = new Datetime();
        $update->save();
        return Redirect::route('admin.edit.post', $id);
    }
    public function deletepost($id){
        $del = Post::findOrFail($id);
        $del->delete();
        return Redirect::route('admin.list.post');
    }
}
