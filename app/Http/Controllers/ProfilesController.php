<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Cache;

class ProfilesController extends Controller
{
    // one way of finding a user
    // public function index($user)
    // {
    //     $user = User::findOrFail($user);

    //     return view('profile.home', [
    //         'user' => $user,
    //     ]);
    // }
    public function index(User $user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
        $postCount = Cache::remember('count.posts.' . $user->id, now()->addSeconds(10), function () use ($user) {
            return $user->posts->count();
        });

        $followersCount = Cache::remember('count.followers.' . $user->id, now()->addSeconds(10), function () use ($user) {
            return $user->profile->followers->count();
        });

        $followingCount = Cache::remember('count.following.' . $user->id, now()->addSeconds(10), function () use ($user) {
            return $user->following->count();
        });

        return view('profile.home', compact('user', 'follows', 'postCount', 'followersCount', 'followingCount'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);
        return view('profile.edit', compact('user'));
    }
    public function update(User $user)
    {
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => '',
        ]);

        if (request('image')) {
            $imagepath = request('image')->store('uploads', 'public');

            $image = Image::make(public_path("storage/{$imagepath}"))->fit(1200, 1200);

            $image->save();
            $imagearr = ['image' => $imagepath];
        }
        auth()->user()->profile->update(array_merge(
            $data,
            $imagearr,
        ));
        return redirect("/profile/{$user->id}");
    }
}
