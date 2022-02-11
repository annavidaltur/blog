<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        $tags = Tag::all();

        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {     
        $post = new Post();
        $post->name = $request->name;
        $post->slug = Str::slug($request->name);
        $post->category_id = $request->category_id;
        $post->status = $request->status;
        $post->extract = $request->extract;
        $post->body = $request->body;
        $post->save();
        
        if($request->tags){
            $post->tags()->attach($request->tags);
        }

        if($request->file('file')){
            $url = Storage::put('public/posts', $request->file('file'));
            $post->image()->create([
                'url' => $url,
            ]);
        }

        return redirect()->route('admin.posts.edit', $post);
    }

    /**
     * Display the specified resource.
     *
     * @param  Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::pluck('name', 'id');
        $tags = Tag::all();
        
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $request->slug = Str::slug($request->name);
        $post->update($request->all());

        if($request->tags){
            $post->tags()->sync($request->tags);
        }        
        
        if($request->file('file')){
            $url = Storage::put('public/posts', $request->file('file'));

            if($post->image){
                Storage::delete('public/' . $post->image->url);
                
                $post->image()->create([
                    'url' => substr($url, 7),
                ]);
            } else {
                $post->image()->create([
                    'url' => substr($url, 7)
                ]);
            }
        }

        return redirect()->route('admin.posts.edit', $post)->with('info', 'El post se actualizó con éxito'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('info', 'El post se eliminó con éxito'); ;
    }
}
