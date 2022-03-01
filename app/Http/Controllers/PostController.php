<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        return view('post');
    }
    public function get_posts($id=null){
        $posts=Post::orderBy('id', 'DESC')->skip($id)->take(5)->get();
        return response()->json($posts);
    }
    public function store(Request $request){
        $description=json_decode($request->description);
        Post::create([
            'description'=>$description
        ]);
        $posts=Post::orderBy('id', 'DESC')->get();
        return response()->json(['p'=>$posts]);
    }
}
