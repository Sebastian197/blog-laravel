<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostPost;
use App\Models\Post;
use App\Models\Category;
use App\Models\PostImage;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'rol.admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')
            ->paginate(5);
        return view('dashboard.post.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::pluck('id', 'title');
        return view('dashboard.post.create', ['post' => new Post(), 'categories' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostPost  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostPost $request)
    {
        Post::create($request->validated());
        return back()
            ->with('status', 'Post creado con éxito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('dashboard.post.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $category = Category::pluck('id', 'title');
        return view('dashboard.post.edit', ['post' => $post, 'categories' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StorePostPost  $request
     * @param  \App\Models\Post  $post
     * @return \App\Http\Requests\StorePostPost  $request
     */
    public function update(StorePostPost $request, Post $post)
    {
        $post->update($request->validated());
        return back()
            ->with('status', 'Post actualizado correctamente!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StorePostPost  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function image(Request $request, Post $post)
    {
        $request->validate([
            'image' => 'required|mimes:jpg,bmp,png|max:10240' //10Mg
        ]);

        $filename = time() . "." . $request->image->extension();
        $request->image->move(public_path('images'), $filename);

        PostImage::create([
            'image' => $filename,
            'post_id' => $post->id
        ]);

        return back()
            ->with('status', 'Imagen cargada correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return back()
            ->with('status', 'Post borrado correctamente!');
    }
}