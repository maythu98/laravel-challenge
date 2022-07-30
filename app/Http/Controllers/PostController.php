<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use Validator;

class PostController extends Controller
{
    public function list()
    {
        $posts = Post::withCount('likes')->latest()->paginate();

        return PostResource::collection($posts);
    }
    
    public function toggleReaction(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'post_id' => 'required|int|exists:posts,id',
        ]);

        // If Validation Fail
        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()->first()
            ], 422);
        }
        
        // Check Post & User Identity
        $post = Post::findOrFail($request->post_id);
        if($post->user_id == auth()->id()) {
            return response()->json([
                'message' => 'You cannot like your post'
            ], 422);
        }        
        
        // User Like, Unlike Toggle
        auth()->user()->likes()->toggle($post);

        //Response
        return response()->json([
            'message' => $post->isLiked() ? "You like this post successfully" : "You unlike this post successfully"
        ]);
    }
}
