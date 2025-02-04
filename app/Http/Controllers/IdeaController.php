<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Auth;
use Illuminate\Http\Request;





class IdeaController extends Controller
{

    public function show(Idea $idea)
    {

        return view('ideas.show', compact('idea'));
    }

    public function edit(Idea $idea)
    {
        if(auth()->id()!== $idea->user_id)
        {
            abort('404');
        }
        $editing = true;
        return view('ideas.show', compact('idea', 'editing'));
    }

    public function update(Idea $idea)
    {
        if(auth()->id()!== $idea->user_id)
        {
            abort('404');
        }
        $validated = Request()->validate(
            [
                'content' => 'Required|min:3|max:240'
            ]
        );
        $idea->update($validated);
        return redirect()->route('ideas.show', $idea->id)->with('success', 'idea Updated successfully');
        ;

    }
    public function store()
    {
        $validated = Request()->validate(
            [
                'content' => 'Required|min:3|max:240'
            ]
        );
        $validated['user_id']=auth()->id();
        Idea::create($validated);
        return redirect()->route('dashboard')->with('success', 'idea created successfully');
    }
    public function destroy(Idea $idea)
    {
        if(auth()->id()!== $idea->user_id)
        {
            abort('404');
        }
        $idea->delete();
        return redirect()->route('dashboard')->with('success', 'idea deleted successfully');
    }
}
