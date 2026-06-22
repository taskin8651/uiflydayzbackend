<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;

class BlogController extends Controller
{
    public function index()
    {
        $posts = BlogPost::query()->where('status', true)
            ->where(fn ($query) => $query->whereNull('published_at')->orWhere('published_at', '<=', now()))
            ->orderByDesc('is_featured')->orderBy('sort_order')->orderByDesc('published_at')->get();

        return view('frontend.blog', [
            'posts' => $posts,
            'featuredPost' => $posts->firstWhere('is_featured', true) ?? $posts->first(),
        ]);
    }

    public function show(BlogPost $blogPost)
    {
        abort_unless($blogPost->status && (!$blogPost->published_at || $blogPost->published_at->isPast()), 404);

        $relatedPosts = BlogPost::query()->where('status', true)->whereKeyNot($blogPost->id)
            ->where('category', $blogPost->category)->orderByDesc('published_at')->take(3)->get();

        return view('frontend.blog-detail', compact('blogPost', 'relatedPosts'));
    }
}
