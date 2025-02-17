<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function follow(User $user)
    {
        $follower=Auth::user();
        $follower->followings()->attach($user->id);
        return redirect()->route('users.show',$user->id)->with('success','followed successfully');
    }

    public function unfollow(User $user)
    {
        $follower=Auth::user();
        $follower->followings()->detach($user->id);
        return redirect()->route('users.show',$user->id)->with('success','unfollowed successfully');

    }

}
