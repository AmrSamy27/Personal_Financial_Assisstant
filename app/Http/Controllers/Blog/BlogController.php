<?php

namespace App\Http\Controllers\Blog;

use App\Blog;
use App\Comment;
use App\Http\Controllers\Controller;
use App\Http\Requests\BlogStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index(){
       $blogs = Blog::all();
        return view('blogs.index',compact('blogs'));
    }
    public function create(){
        return view('blogs.create');
    }
    public function store(BlogStoreRequest $request){
       $request->blog_image = $request->blog_image?$request->file('blog_image')->store('blogs_images'):'null';
       $isCreated = Blog::create([
            'title'=>$request->title,
            'body'=>$request->body,
            'blog_image'=>$request->blog_image,
            'user_id'=> Auth::user()->id
        ]);
        if($isCreated){
            return view('blogs.index');
        }
        dd('failed');
    }
    public function show($id){
        $blog = Blog::find($id)->withCount('comments')->first();
        return view('blogs.show',compact('blog'));
    }
    public function storeComment($id,Request $request){
           $comment = Comment::create([
                'body'=>$request->comment,
                'user_id'=>Auth::user()->id,
                'blog_id'=>$id,
                'blog_image'=>'null'
            ]);
        return response()->json(['comment'=>$comment,'user'=>Auth::user()]);
    }
}
