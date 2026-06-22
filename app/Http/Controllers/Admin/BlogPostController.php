<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    public function index()
    {
        $blogPosts = BlogPost::query()->orderByDesc('published_at')->orderBy('sort_order')->get();
        return view('admin.blog-posts.index', compact('blogPosts'));
    }

    public function create() { return view('admin.blog-posts.create'); }

    public function store(Request $request)
    {
        BlogPost::create($this->payload($request));
        return redirect()->route('admin.blog-posts.index')->with('success', 'Blog article created successfully.');
    }

    public function edit(BlogPost $blogPost) { return view('admin.blog-posts.edit', compact('blogPost')); }

    public function update(Request $request, BlogPost $blogPost)
    {
        $blogPost->update($this->payload($request, $blogPost));
        return redirect()->route('admin.blog-posts.index')->with('success', 'Blog article updated successfully.');
    }

    public function destroy(BlogPost $blogPost)
    {
        $blogPost->delete();
        return back()->with('success', 'Blog article deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        BlogPost::whereIn('id', $request->input('ids', []))->delete();
        return response(null, 204);
    }

    private function payload(Request $request, ?BlogPost $blogPost = null): array
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'], 'excerpt' => ['nullable', 'string'],
            'content' => ['required', 'string'], 'category' => ['required', 'string', 'max:80'],
            'author' => ['nullable', 'string', 'max:100'], 'read_time' => ['nullable', 'string', 'max:30'],
            'image_path' => ['nullable', 'string', 'max:255'], 'published_at' => ['nullable', 'date'],
            'sort_order' => ['nullable', 'integer'],
        ]);
        $validated['slug'] = BlogPost::makeUniqueSlug($validated['title'], $blogPost?->id);
        $validated['author'] = $validated['author'] ?: 'FlyDayz Care Team';
        $validated['read_time'] = $validated['read_time'] ?: '4 min read';
        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['status'] = $request->boolean('status');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        return $validated;
    }
}
