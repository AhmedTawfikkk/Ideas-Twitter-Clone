<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FeedController extends Controller
{
    public function __invoke()
    {
        $followingIDs = auth()->user()->followings()->pluck('user_id');

        $ideas = Idea::with('user', 'comments.user')
            ->whereIn('user_id', $followingIDs)
            ->latest();

        if (Request()->has('search')) {
            $ideas = $ideas->where('content', 'like', '%' . request()->get('search') . '%');
        }
        return view('dashboard', [
            'ideas' => $ideas->paginate(5)
        ]);
    }
}
