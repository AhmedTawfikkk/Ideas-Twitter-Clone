<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;





class IdeaController extends Controller
{

    public function show(Idea $idea)
    {

        return view('ideas.show', compact('idea'));
    }

    public function edit(Idea $idea)
    {
        $editing = true;
        return view('ideas.show', compact('idea', 'editing'));
    }

    public function update(Idea $idea)
    {
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
        Idea::create($validated);
        return redirect()->route('dashboard')->with('success', 'idea created successfully');
    }
    public function destroy(Idea $idea)
    {

        $idea->delete();
        return redirect()->route('dashboard')->with('success', 'idea deleted successfully');
    }
}
