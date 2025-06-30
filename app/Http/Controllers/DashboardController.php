<?php

namespace App\Http\Controllers;

use App\Models\idea;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
      
       $ideas=idea::when(Request()->has('search'),function($query){   // like if statement but can be chained
        $query->search(request('search'));  //search scope
       })->orderBy('created_at','desc')->paginate(5);

        return view('dashboard',[
            'ideas'=>$ideas
        ]);
    }
}
