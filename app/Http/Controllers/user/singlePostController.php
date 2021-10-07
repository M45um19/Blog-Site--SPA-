<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $comments = comment::where('post_id', $id)->get();
        return view('layouts.user.singlePost', compact(['posts', 'categories', 'relatedposts', 'comments']));
    }
    public function comment(Request $request)
    {
        if (Auth::check()) {
            $username = Auth::user()->name;
            $userid = Auth::user()->id;
            comment::create([
                'description' => $request->description,
                'user_id' => $userid,
                'user_name' => $username,
                'post_id' => $request->post_id,
            ]);
        } else {
            return redirect('/login');
        }
        $post_id = $request->post_id;
        return redirect()->route('post.single', ['id' => $post_id]);
    }
}
