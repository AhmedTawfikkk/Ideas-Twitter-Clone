<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IdeaLikeController extends Controller
{
    public function like(Idea $idea)
    { 
        $liker=auth()->user();
        $liker->likes()->attach($idea);
        return redirect()->route('dashboard')->with('success','liked successfully');

    }

    public function unlike(Idea $idea)
    {
        
        $liker=auth()->user();
        $liker->likes()->detach($idea->id);
        
        return redirect()->route('dashboard')->with('success','unliked successfully');
         
    }
}
