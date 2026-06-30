<?php

namespace App\Http\Controllers\api\v1;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\storePostRequest;
use App\Http\Resources\PostResource;

class PostController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {   
        echo($request->input('author'));
        return PostResource::collection(Post::with('author')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        //$data = $request->validated();
        $data['user_id'] =1;
        $post = Post::create($data);
        return new PostResource($post);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return response()->json(new PostResource($post));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePostRequest $request, Post $post)
    {
        $data = $request->validated();
        $post->update($data);
        return new PostResource($post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return response()->noContent();
    }
}
