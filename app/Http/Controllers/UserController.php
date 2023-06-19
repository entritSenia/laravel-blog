<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Follow;
use Illuminate\Http\Request;
use App\Events\OurExampleEvent;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;

class UserController extends Controller
{

    // WEB
    public function showCorrectHomepage()
    {
        if (auth()->check()) {
            return view('homepage-feed', ['posts' => auth()->user()->feedPosts()->latest()->paginate(4), 'users' => auth()->user()->get()]);
        } else {
            $postCount = Cache::remember('postCount', 20, function () {
                // sleep(5);
                return Post::count();
            });
            return view('homepage', ['postCount' => $postCount]);
        }
    }

    public function login(Request $request)
    {
        $incomingFields = $request->validate([
            'loginusername' => 'required',
            'loginpassword' =>  'required',
        ]);
        if (auth()->attempt(['username' => $incomingFields['loginusername'], 'password' => $incomingFields['loginpassword']])) {
            $request->session()->regenerate();
            event(new OurExampleEvent(['username' => auth()->user()->username, 'action' => 'login']));
            return redirect('/')->with('success', 'Logged in successfully');
        } else {
            return redirect('/')->with('error', 'Invalid username or password');
        }
    }

    public function register(Request $request)
    {
        $incomingFields = $request->validate([
            'username' => ['required', 'min:3', 'max:20', Rule::unique('users', 'username')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'confirmed'],
        ]);

        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user = User::create($incomingFields);
        auth()->login($user);
        return redirect('/')->with('success', 'You have successfully registered');
    }


    public function logout()
    {
        event(new OurExampleEvent(['username' => auth()->user()->username, 'action' => 'logout']));
        auth()->logout();
        return redirect('/')->with('success', 'Logged out successfully');
    }



    private function getSharedData($user)
    {
        $currentlyFollowing = 0;

        if (auth()->check()) {
            $currentlyFollowing = Follow::where([['user_id', '=', auth()->user()->id], ['followeduser', '=', $user->id]])->count();
        }

        View::share('sharedData', ['currentlyFollowing' => $currentlyFollowing, 'avatar' => $user->avatar, 'username' => $user->username, 'postCount' => $user->posts()->count(), 'followersCount' => $user->followers()->count(), 'followingCount' => $user->followingTheseUsers()->count(), 'followers' => $user->followers()->latest()->get(), 'followings' => $user->followingTheseUsers()->latest()->get(), 'posts' => $user->posts()->latest()->get()]);
    }

    public function profile(User $user)
    {
        $this->getSharedData($user);
        return view('profile', ['avatar' => $user->avatar, 'username' => $user->username, 'posts' => $user->posts()->latest()->get()]);
    }
    public function ManageAvatarForm(Request $request)
    {
        return view('/avatar-form');
        // $request->validate([
        //     'avatar' => 'image',
        // ]);
        // $user = auth()->user();
        // $user->avatar = $request->file('avatar');
        // $user->save();
        // return redirect('/')->with('success', 'Avatar uploaded successfully');
    }

    public function storeAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|max:4000'
        ]);

        $user = auth()->user();

        $filename = $user->username . '-' . uniqid() . '.jpg';

        $imgData = Image::make($request->file('avatar'))->fit(240)->encode('jpg');
        Storage::put('public/avatar/' . $filename, $imgData);

        $oldAvatar = $user->avatar;

        $user->avatar = $filename;
        $user->save();

        if ($oldAvatar != $user->avatar) {
            Storage::delete(str_replace("/storage/", "public/", $oldAvatar));
        }

        return back()->with('success', 'Avatar uploaded successfully');
    }





    // API

    public function loginApi(Request $request)
    {
        $incomingFields = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (auth()->attempt($incomingFields)) {
            $user = User::where('username', $incomingFields['username'])->first();
            $token = $user->createToken('ourapptoken')->plainTextToken;
            return $token;
        }
        return 'wrong credentials';
    }
}
