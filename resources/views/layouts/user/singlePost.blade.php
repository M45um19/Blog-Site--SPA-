<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xtra Blog</title>
    <link rel="stylesheet" href="{{asset('assets/assets2/fontawesome/css/all.min.css')}}"> <!-- https://fontawesome.com/ -->
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet"> <!-- https://fonts.google.com/ -->
    <link href="{{asset('assets/assets2/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/assets2/css/templatemo-xtra-blog.css')}}" rel="stylesheet">
    <!--
    
TemplateMo 553 Xtra Blog

https://templatemo.com/tm-553-xtra-blog

-->
</head>

<body>
    <header class="tm-header" id="tm-header">
        <div class="tm-header-wrapper">
            <button class="navbar-toggler" type="button" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="tm-site-header">
                <div class="mb-3 mx-auto tm-site-logo"><i class="fas fa-times fa-2x"></i></div>
                <h1 class="text-center">Xtra Blog</h1>
            </div>
            <nav class="tm-nav" id="tm-nav">
                <ul>
                    <li class="tm-nav-item"><a href="/" class="tm-nav-link">
                            <i class="fas fa-home"></i>
                            Blog Home
                        </a></li>
                    <li class="tm-nav-item active"><a href="" class="tm-nav-link">
                            <i class="fas fa-pen"></i>
                            Single Post
                        </a></li>

                    <li class="tm-nav-item"><a href="" class="tm-nav-link">
                            <i class="far fa-comments"></i>
                            Contact Us
                        </a></li>
                </ul>
            </nav>
            <div class="tm-mb-65">
                <a href="https://facebook.com" class="tm-social-link">
                    <i class="fab fa-facebook tm-social-icon"></i>
                </a>
                <a href="https://twitter.com" class="tm-social-link">
                    <i class="fab fa-twitter tm-social-icon"></i>
                </a>
                <a href="https://instagram.com" class="tm-social-link">
                    <i class="fab fa-instagram tm-social-icon"></i>
                </a>
                <a href="https://linkedin.com" class="tm-social-link">
                    <i class="fab fa-linkedin tm-social-icon"></i>
                </a>
            </div>
            <p class="tm-mb-80 pr-5 text-white">
                Xtra Blog is a multi-purpose HTML template from TemplateMo website. Left side is a sticky menu bar. Right side content will scroll up and down.
            </p>
        </div>
    </header>
    <div class="container-fluid">
        <main class="tm-main">
            <!-- Search form -->
            <div class="row tm-row">
                <div class="col-12">
                    <form action="{{ route('search') }}" method="GET" class="form-inline tm-mb-80 tm-search-form">
                        <input class="form-control tm-search-input" name="search" type="text" placeholder="Search..." aria-label="Search">
                        <button class="tm-search-button" type="submit">
                            <i class="fas fa-search tm-search-icon" aria-hidden="true"></i>
                        </button>
                    </form>
                </div>
            </div>
            @foreach($posts as $post)
            @php
            $post_id = $post->id;
            @endphp
            <div class="row tm-row">
                <div class="col-12">
                    <hr class="tm-hr-primary tm-mb-55">
                    <!-- Video player 1422x800 -->
                    <img width="954" height="535" class="tm-mb-40" src="{{asset('storage/post')}}/{{$post->image}}">

                    </img>
                </div>
            </div>
            <div class="row tm-row">
                <div class="col-lg-8 tm-post-col">
                    <div class="tm-post-full">
                        <div class="mb-4">
                            <h2 class="pt-2 tm-color-primary tm-post-title">{{$post->Title}}</h2>
                            <p class="tm-mb-40">{{$post->created_at}}</p>
                            <p>
                                {{$post->description}}
                            </p>


                        </div>
                        @endforeach
                        <!-- Comments -->
                        <div>

                            @if($comments->count()>0)
                            <h2 class="tm-color-primary tm-post-title">Comments</h2>
                            @foreach($comments as $comment)
                            <hr class="tm-hr-primary tm-mb-45">
                            <div class="tm-comment tm-mb-45">
                                <figure class="tm-comment-figure">
                                    <img src="{{asset('assets/assets2/img/user.png')}}" alt="Image" class="mb-2 rounded-circle img-thumbnail" height="100px" width="100px">
                                    <figcaption class="tm-color-primary text-center">{{$comment->user_name}}</figcaption>
                                </figure>
                                <div>
                                    <p>
                                        {{$comment->description}}
                                    </p>
                                    <div class="d-flex justify-content-between">

                                        <span class="tm-color-primary">{{$comment->created_at}}</span>
                                    </div>
                                </div>

                            </div>
                            @endforeach
                            @else
                            <h2 class="tm-color-primary tm-post-title">No Comments for this post</h2>
                            @endif
                            <form action="{{ route('comment') }}" method="POST" class="mb-5 tm-comment-form">
                                @csrf
                                <h2 class="tm-color-primary tm-post-title mb-4">Your comment:</h2>
                                <input type="text" value="{{$post_id}}" name="post_id" hidden>
                                <div class="mb-4">
                                    <textarea class="form-control" name="description" rows="6" required></textarea>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="tm-btn tm-btn-primary tm-btn-small">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <aside class="col-lg-4 tm-aside-col">
                    <div class="tm-post-sidebar">
                        <hr class="mb-3 tm-hr-primary">
                        <h2 class="mb-4 tm-post-title tm-color-primary">Categories</h2>
                        <ul class="tm-mb-75 pl-5 tm-category-list">
                            @foreach($categories as $category)
                            <li><a href="{{route('post.category',['id'=>$category->id])}}" class="tm-color-primary">{{$category->name}}</a></li>
                            @endforeach
                        </ul>
                        <hr class="mb-3 tm-hr-primary">
                        <h2 class="tm-mb-40 tm-post-title tm-color-primary">Related Posts</h2>
                        @foreach($relatedposts as $relatedpost)
                        <a href="#" class="d-block tm-mb-40">
                            <figure>
                                <img src="{{asset('storage/post')}}/{{$relatedpost->image}}" alt="Image" class="mb-3 img-fluid">
                                <figcaption class="tm-color-primary">{{$relatedpost->Title}}</figcaption>
                            </figure>
                        </a>
                        @endforeach

                    </div>
                </aside>
            </div>
            <footer class="row tm-row">
                <hr class="col-12">
                <div class="col-md-6 col-12 tm-color-gray">
                    Developed By: <a rel="nofollow" target="_parent" href="https://templatemo.com" class="tm-external-link">Naim Istiak Masum</a>
                </div>
                <div class="col-md-6 col-12 tm-color-gray tm-copyright">
                    Copyright 2021 m45um19
                </div>
            </footer>
        </main>
    </div>
    <script src="{{asset('assets/assets2/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/assets2/js/templatemo-script.js')}}"></script>
</body>

</html>