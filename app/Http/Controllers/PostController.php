<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $post = Post::latest()->get();
        return response()->json($post, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $post = Post::create([
            'Category_id' => $request->category,
            'title' => $request->title,
            'description' => $request->description,
        ]);
        if ($request->image) {
            $imageName = time() . '_' . uniqid() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('storage/post'), $imageName);
            $post->image = $imageName;
            $post->save();
        }

        return response()->json($post, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        if ($post) {
            return response()->json($post, 200);
        } else {
            return response()->json('failed', 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
        $post->update([
            'Title' => $request->title,
            'description' => $request->description,
            'Category_id' => $request->category,
        ]);
        if ($request->newImage) {
            unlink(public_path("storage/post/" . $request->oldImageform));
            $imageName = time() . '_' . uniqid() . '.' . $request->newImage->getClientOriginalExtension();
            $request->newImage->move(public_path('storage/post'), $imageName);
            $post->image = $imageName;
            $post->save();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        if ($post) {
            unlink(public_path("storage/post/" . $post->image));
            $post->delete();
            return response()->json($post, 200);
        } else {
            return response()->json('failed', 404);
        }
    }
}
