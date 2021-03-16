<?php

namespace App\Http\Controllers\dashboard;

use App\Helpers\CustomUrl;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostPost;
use App\Http\Requests\UpdatePostPut;
use App\Models\Post;
use App\Models\Category;
use App\Models\PostImage;
use App\Models\Tag;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

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
        $posts = Post::with('category')
            ->orderBy('created_at', 'desc')
            ->paginate(5);
        return view('dashboard.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        $tags = Tag::pluck('id', 'title');
        $categories = Category::pluck('id', 'title');
        return view('dashboard.post.create', compact('post', 'categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostPost  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostPost $request)
    {
        if ($request->url_clean == '') {
            $urlClean = CustomUrl::urlTitle(CustomUrl::convertAccentedCharacters($request->title), '-', true);
        } else {
            $urlClean = CustomUrl::urlTitle(CustomUrl::convertAccentedCharacters($request->url_clean), '-', true);
        }

        $requestData = $request->validated();
        $requestData['url_clean'] = $urlClean;
        $validator = Validator::make($requestData, StorePostPost::myRukes());

        if ($validator->fails()) {
            return redirect('dashboard/post/create')
                ->withErrors($validator)
                ->withInput();
        }

        $post = Post::create($requestData);
        $post->tags()->sync($request->tags_id);
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
        return view('dashboard.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags = Tag::pluck('id', 'title');
        $categories = Category::pluck('id', 'title');
        return view('dashboard.post.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostPut  $request
     * @param  \App\Models\Post  $post
     * @return \App\Http\Requests\StorePostPost  $request
     */
    public function update(UpdatePostPut $request, Post $post)
    {
        $post->tags()->sync($request->tags_id);
        $post->update($request->validated());
        return back()
            ->with('status', 'Post actualizado correctamente!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function image(Request $request, Post $post)
    {
        $request->validate([
            'image' => 'required|mimes:jpg,bmp,png|max:10240' //10Mg
        ]);

        //$filename = time() . "." . $request->image->extension();
        //$request->image->move(public_path('images'), $filename);
        $path = $request->image->store('public/images_post');

        PostImage::create([
            'image' => $path,
            'post_id' => $post->id
        ]);

        return back()
            ->with('status', 'Imagen cargada correctamente!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function contentImage(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:jpg,bmp,png|max:10240' //10Mg
        ]);

        $filename = time() . "." . $request->image->extension();
        $request->image->move(public_path('images_post'), $filename);

        return response()->json(['default' => URL::to('/') . '/images_post/' . $filename]);
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