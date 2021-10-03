<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class PostsApiController extends Controller
{
    public function index(){
        return Post::all();
    }

    public function store(Request $request){
        // return ["result" => "Dt inserted"];
        // request()->validate([
        //     'title' =>'required',
        //     'content' =>'required',
        // ]);
    
        // $result = Post::create([
        //     'title' =>request('title'),
        //     'content' =>request('content'),
        // ]);
        // return [
        //     "result" => $result
        // ];

        $posts = new Post;
        $posts->title = $request->title;
        $posts->content = $request->content;
        $result = $posts->save();
        if ($result) {
            return ["result" => "Dt inserted"];
        }else {
            return ["result" => "operation failed "];
        }
    }

    public function update(Post $post){
        request()->validate([
            'title' =>'required',
            'content' =>'required',
        ]);
    
        $success = $post->update([
            'title' =>request('title'),
            'content' =>request('content'),
        ]);
        return ([
            'success' => $success
        ]);
    }

    public function destroy(Post $post){
        $success = $post->delete();

	return ([
		'success' =>$success
	]);
    }
}
