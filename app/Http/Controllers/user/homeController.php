<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class homeController extends Controller
{
    //
    public function index()
    {
        $posts = Post::select(
            "posts.id",
            "posts.Title",
            "posts.description",
            "posts.image",
            "posts.created_at",
            "Categories.name as category_name"
        )
            ->leftJoin("Categories", "Categories.id", "=", "posts.Category_id")
            ->paginate(8);
        $categories = category::get();

        return view('layouts.user.userdashboard', compact(['posts', 'categories']));
    }
    public function categorywise($id)
    {
        $posts = Post::select(
            "posts.id",
            "posts.Title",
            "posts.description",
            "posts.image",
            "posts.category_id",
            "posts.created_at",
            "Categories.name as category_name"
        )
            ->leftJoin("Categories", "Categories.id", "=", "posts.Category_id")
            ->where('category_id', $id)
            ->paginate(8);
        $categories = category::get();

        return view('layouts.user.userdashboard', compact(['posts', 'categories']));
    }
}
