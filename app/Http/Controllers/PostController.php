<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //
    public function create (Request $request){
        $this->validate($request,[
            'post_title'=>'required|max:100',
            'post_body'=>'required|max:500',

        ]);
        $post =new Post();
        $post->title=$request['post_title'];
        $post->body=$request['post_body'];
        $post->user_id = auth()->id();
        $post->category_id = $request['options'];
        $message = 'post can not be stored ';

        if($post->save()){
            $message = 'post succesfully posted';
        }

        return redirect()->back()-> with(['message'=> $message]);



    }
    public  function  show($id){
        $posts = (new \App\Post)->find($id);
        $com = $posts->comments;
        return view('post_view')->with(['posts'=> $posts,'com'=>$com]);
    }
    public function pro($id){
        $user = (new \App\User)->find($id);


        $ps = $user->post;
            //(new \App\Post)->find($id)->get();

        return view('profile')->with(['ps'=>$ps]);
    }
    public function comment($id,Request $request){

        $com = new Comment();
        $com->post_id = $id;
        $com->body=$request['userComment'];
        $com->user_id=auth()->id();
        $com->save();
        return back();

    }
     public function fuck(Request $request)
    {
      # code...
      $post =new Post();
      $post->title=$request->title;
      $post->body=$request->body;
      $post->user_id = auth()->id();
      $post->category_id = $request->cat;
      if($post->save()){
        $ps = new Post();
          return route('x');

      }

    }


}
