<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function show(User $user)
    {

        return view('admin.users.profile', ['user' => $user]);
    }

    public function update(User $user)
    {
        $inputs = request()->validate([
            'username' => ['required', 'string', 'max:255', 'alpha_dash'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'avatar' => ['file'],
            // 'password' => ['min:6', 'max:255', 'confirmed'],
        ]);

        if (request('avatar')) {
            $inputs['avatar'] = request('avatar')->store('images');
        }


        $user->update($inputs);

        return back();

        // // If images in the request exists
        // if (request('image')) {
        //     // save the image in the $inputs with the key of 'image'
        //     $inputs['image'] = request('image')->store('images');
        //     $post->image = $inputs['image'];
        // }

        // $post->title     = request('title');
        // $post->body    = request('body');

        // $this->authorize('update', $post);

        // $post->save();

        // // auth()->user()->posts()->save($post);


        // // redirect
        // Session::flash('message1', 'Successfully updated post!');
        // return redirect()->route('post.index');
    }
}
