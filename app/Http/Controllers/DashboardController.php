<?php

namespace App\Http\Controllers;

use App\Models\idea;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        
       $ideas=idea::orderBy('created_at','desc');
       if(Request()->has('search')){
        $ideas=$ideas->where('content','like','%'.request()->get('search').'%');
       }
        return view('dashboard',[
            'ideas'=>$ideas->paginate(5)
        ]);
    }
}
