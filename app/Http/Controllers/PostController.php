<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Jobs\SendNewPostEmail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    // WEB


    public function showCreateForm()
    {
        return view('/create-post');
    }

    public function storeNewPost(Request $request)
    {
        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'required'
        ]);
        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $incomingFields['image'] = strip_tags($incomingFields['image']);
        $incomingFields['user_id'] = auth()->id();

        $request->validate([
            'image' => 'required|image|max:3000'
        ]);

        $post = auth()->user()->posts()->create($incomingFields);

        $filename = $post->title . '-' . uniqid() . '.jpg';

        $imgData = Image::make($request->file('image'))->fit(990)->encode('jpg');
        Storage::put('public/image/' . $filename, $imgData);

        // $oldImage = $post->image;

        $post->image = $filename;
        $post->save();

        // if ($oldImage != $post->image) {
        //     Storage::delete(str_replace("/storage/", "public/", $oldImage));
        // }

        // $newPost = Post::create($incomingFields);
        // dispatch(new SendNewPostEmail(['sendTo' => auth()->user()->email, 'name' => auth()->user()->username, 'title' => $newPost->title, 'image' => $newPost->image]));
        return redirect("/post/{$post->id}")->with('success', 'New Post created!');
    }

    public function viewSinglePost(Post $post)
    {
        $postImage = $post->image;
        $postTitle = $post->title;
        $post['body'] = strip_tags(Str::markdown($post->body), '<p><ul><ol><em><br><strong>');
        return view('single-post', ['post' => $post, 'postTitle' => $postTitle, 'postImage' => $postImage]);
        // 'posts' => $post->user->username->count,
    }

    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/profile/' . auth()->user()->username)->with('success', 'Post deleted!');
    }


    public function showEditForm(Post $post)
    {
        return view('edit-post', ['post' => $post]);
    }

    public function actuallyUpdate(Post $post, Request $request)
    {
        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'required'
        ]);
        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $incomingFields['image'] = strip_tags($incomingFields['image']);
        $incomingFields['user_id'] = auth()->id();

        $oldImage = $post->image;

        if ($oldImage != $post->image) {
            Storage::delete(str_replace("/storage/", "public/", $oldImage));
        }

        $post->update($incomingFields);
        return redirect("/post/{$post->id}")->with('success', 'Post updated!');
    }

    public function search($term)
    {
        $posts = Post::search($term)->get();
        $posts->load('user:id,username,avatar');
        return $posts;
    }




    // API

    public function storeNewPostApi(Request $request)
    {
        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'required'
        ]);
        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $incomingFields['image'] = strip_tags($incomingFields['image']);
        $incomingFields['user_id'] = auth()->id();

        $newPost = Post::create($incomingFields);
        dispatch(new SendNewPostEmail(['sendTo' => auth()->user()->email, 'name' => auth()->user()->username, 'title' => $newPost->title, 'image' => $newPost->image]));
        return $newPost->id;
    }

    public function deletePostApi(Post $post)
    {
        $post->delete();
        return 'true';
    }
}
