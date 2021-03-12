<?php

namespace App\Http\Controllers\api;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends ApiResponseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::join('post_images', 'post_images.post_id', '=', 'posts.id')
            ->join('categories', 'categories.id', '=', 'posts.category_id')
            ->select('posts.*', 'categories.title as category', 'post_images.image')
            ->orderBy('posts.created_at', 'desc')
            ->paginate(10);
        return response()
            ->json($posts, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $post->image;
        $post->category;
        return $this->successResponse($post);
    }

    /**
     * Display the specified resource.
     *
     * @param  String  $url_clean
     * @return \Illuminate\Http\Response
     */
    public function url_clean(string $url_clean)
    {
        $post = Post::where('url_clean', $url_clean)->firstOrFail();
        $post->image;
        $post->category;
        return $this->successResponse($post);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function category(Category $category)
    {
        return $this->successResponse([
            "post" => $category
                ->post()
                ->paginate(10),
            "category" => $category
        ]);
    }
}
