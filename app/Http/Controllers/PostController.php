<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Model\User;
use Illuminate\Support\Facades\Auth;
use Session;


class PostController extends Controller
{
    public function show(Post $post)
    {
        // ['name you are going to use in the view' => name of the object passed in the show method ]
        return view('blog-post', ['post' => $post]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store()
    {

        $this->authorize('create', Post::class);

        $inputs = request()->validate([

            'title' => 'required|min:8|max:255',
            'image' => 'file',
            'body' => 'required'
        ]);

        // If images in the request exists
        if (request('image')) {
            // save the image in the $inputs with the key of 'image'
            $inputs['image'] = request('image')->store('images');
        }

        Auth::user()->posts()->create($inputs);
        session()->flash('message1', 'Post has been succesfuly created');
        return redirect()->route('post.index');
    }

    public function index()
    {

        // This displays the relationship
        // $posts = auth()->user()->posts();

        // This displays an collection of objects
        // $posts = auth()->user()->posts;

        $posts = auth()->user()->posts()->paginate(5);

        return view('admin.posts.index', ['posts' => $posts]);
    }

    public function destroy(Post $post)
    {

        $this->authorize('delete', $post);

        $post->delete();

        Session::flash('message', 'Post was deleted');

        return back();
    }

    public function edit(Post $post)
    {
        if (auth()->user()->can('view', $post)) {
        };
        $this->authorize('view', $post);
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Post $post)
    {
        $inputs = request()->validate([

            'title' => 'required|min:8|max:255',
            'image' => 'file',
            'body' => 'required'
        ]);

        // If images in the request exists
        if (request('image')) {
            // save the image in the $inputs with the key of 'image'
            $inputs['image'] = request('image')->store('images');
            $post->image = $inputs['image'];
        }

        $post->title     = request('title');
        $post->body    = request('body');

        $this->authorize('update', $post);

        $post->save();

        // auth()->user()->posts()->save($post);


        // redirect
        Session::flash('message1', 'Successfully updated post!');
        return redirect()->route('post.index');
    }
}
