<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Models\idea;
use App\Models\Comment;


class CommentController extends Controller
{
    public function store(CreateCommentRequest $request,idea $idea)
    {
        $validated=$request->validated();
       $validated['user_id']=auth()->id();
       $validated['idea_id']=$idea->id;
       Comment::create($validated);
        return redirect()->route('ideas.show',$idea->id)->with('success','comment posted successfully');
        
    }
}
