<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Profile;
use App\User;
use Dotenv\Store\File\Paths;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $user = auth()->user()->following()->pluck('profiles.user_id');
        $post = Post::whereIn('user_id',$user)->with('user')->latest()->get();
        return view('posts.index',compact('post'));
    }

    public function create(){
        return view('posts.create');
    }

    public function store()
    {
        $data=request()->validate([
            'caption'=>'required',
            'image'=>['required','image'],
        ]);

        $imagePath = request('image')->store('uploads','public');
        
        $image=Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
        $image->save();
        
        auth()->user()->posts()->create([
            'caption'=>$data['caption'],
            'images'=>$imagePath,
        ]);

        return redirect('/profile/'.auth()->user()->id);
        
    }

    public function show(Post $post){
        return view('posts.show',compact('post'));
    }
}
