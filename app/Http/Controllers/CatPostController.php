<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CatPostRequest;
use App\CatPost;
use App\Post;
use Redirect,Datetime,DB;

class CatPostController extends Controller
{
    public function index(){
        $data = CatPost::select('id','title_cat', 'intro')->get();
        return view('admin.module.post.catlist', compact(['data']));
    }
    public function getaddcat(){
        return view('admin.module.post.catadd');
    }
    public function postcat(CatPostRequest $req){
        $newCat = new CatPost();
        $newCat->title_cat = $req->txtCatName;
        $newCat->slug = str_slug($req->txtCatName,'-');
        $newCat->intro = $req->txtintro;
        $newCat->created_at = new Datetime();
        
        // $newCat = $req->validate([
        //     'name' => [new CatPostRequest],
        // ]);
        $newCat->save();
        return Redirect::route('admin.list.catpost')->with('message','Created Successfully');
    }
    public function geteditcat($id){
        $data = CatPost::find($id);
        return view('admin.module.post.catedit',compact('data'));
    }
    public function updatecat(Request $req, $id){
        $update = CatPost::find($id);
        $update->title_cat = $req->txtCatName;
        $update->slug = str_slug($req->txtCatName,'-');
        $update->intro = $req->txtintro;
        $update->updated_at = new Datetime();
        $update->save();
        return Redirect::route('admin.list.catpost');
    }

    public function deletecat($id){
        $del = CatPost::findOrFail($id);
        $del->delete();
        return Redirect::route('admin.list.catpost');
    }
}
