<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\PostImage;

class PostController extends Controller
{
    public function getAllPosts()
    {
        $posts = Post::with('post_images')->orderBy('created_at', 'desc')->get();
        return response()->json(['error' => false, 'data' => $posts]);
    }

    public function createPost(Request $request)
    {
        $user = Auth::user();
        $title = $request->title;
        $body = $request->body;
        $images = $request->images;

        $post = Post::create([
            'title' => $title,
            'body' => $body,
            'user_id' => $user->id
        ]);

        foreach ($images as $image) {
            $imagePath = Storage::disk('uploads')->put($user->email . '/posts', $image);

            PostImage::create([
                'post_image_caption' => $title,
                'post_image_path'=> '/app/public/'.$imagePath,
                'post_id'=>$post->id
            ]);
        }

        return response()->json(['error'=> false, 'data'=>$post]);
    }
}
