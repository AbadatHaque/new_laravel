<?php

namespace App\Http\Controllers\api\v1;

use Illuminate\Http\Request;

class PostController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ['message' => 'This is v1 index method'];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = $request->only('name', 'email');
        return $user;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return [
            'name'=>'Sk',
            'email'=>'sk@gmail.com',
            'message'=>'This is v1 show method',
        ];
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
