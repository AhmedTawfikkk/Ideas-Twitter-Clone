<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Auth;
use Storage;

class UserController extends Controller
{

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $ideas = $user->ideas()->paginate(5);
        return view('users.show', compact('user', 'ideas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user);
        $ideas = $user->ideas()->paginate(5);
        return view('users.edit', compact('user', 'ideas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $this->authorize('update', $user);   
        $validated = $request->validated();

        if (request()->has('image')) {
            $imagepath = request()->file('image')->store('profile', 'public');
            $validated['image'] = $imagepath;
            Storage::disk('public')->delete($user->image ?? '');
        }
        $user->update($validated);
        return redirect()->route('profile');
    }

    public function profile()
    {
        return $this->show(Auth::user());
    }
}
