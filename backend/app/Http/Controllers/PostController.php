<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // sleep(1);
        $q = $request->query('q') ?? null;
        $category_ids = null;
        if ($request->has('category') && $request->query('category') != 'all') {
            $category_ids = explode(',', $request->query('category'));
        }
        $posts = Post::when($q, function ($query, $q) {
            $query->where('title', 'like', "%{$q}%")
                ->orWhere('content', 'like', "%{$q}%");
        })->when($category_ids, function ($query, $category_ids) {
            $query->whereHas('categories', function ($q) use ($category_ids) {
                $q->whereIn('categories.id', $category_ids);
            });
        })->orderBy('created_at', 'desc')->get();
        return $posts->toResourceCollection();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return $post->toResource();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
