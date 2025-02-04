<?php

namespace App\Http\Controllers;

use App\Models\idea;
use App\Models\Comment;


class CommentController extends Controller
{
    public function store(idea $idea)
    {
       
        $comment=new Comment();
        $comment->idea_id=$idea->id;
        $comment->content=request()->get('content');
        $comment->user_id=auth()->id();
        $comment->save();
        
        return redirect()->route('ideas.show',$idea->id)->with('success','comment posted successfully');
        
    }
}
