<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $uname = auth()->user()->name;
    return Post::where('user_name',$uname)->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    // $post = new Post();
    // $post->fill($request->all());
    // $uname = auth()->user()->name;
    // $post->user_name = $name;
    // $post->save();
    // return $post;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // return Post::find($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    // $post->fill($request->all());
    // $post->save();
    // return $post;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    // $post->delete();
    // return $post;
    }
}
