<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
     public function index()
    {
        $ideas=idea::latest()->paginate(5);
        return view('admin.ideas.index',compact('ideas'));
    }
}
