<?php

namespace App\Http\Controllers\api\v1;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Post::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
        'title'=> 'required|string|min:2',
        'content'=> ['required', 'max:255']
        ]);
        $validateData['user_id'] =1;
        $data = Post::create($validateData);
        return $data;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $singlePost = Post::findOrFill($id);
        return response()->json($singlePost);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'name'=> 'required|string|min:2',
            'email'=> ['required', 'email']
        ]);
        return $validateData;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
