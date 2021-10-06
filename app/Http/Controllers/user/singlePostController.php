<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\Post;
use Illuminate\Http\Request;

class singlePostController extends Controller
{
    //
    public function index($id)
    {

        $posts = Post::where('id', $id)->get();
        $posts2 = Post::where('id', $id)->first();
        $categories = category::get();
        $relatedpostId = $posts2->Category_id;
        $relatedposts = Post::where('Category_id', $relatedpostId)->where('id', '!=', $posts2->id)->take(4)->get();
        return view('layouts.user.singlePost', compact(['posts', 'categories', 'relatedposts']));
    }
}
