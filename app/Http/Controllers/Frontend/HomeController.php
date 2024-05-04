<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $query = Blog::query();
        if ($request->ajax()) {
            $blogs = $query->where('title', 'LIKE', '%' . $request->search . '%')->orWhere('slug','LIKE','%'.$request->search.'%')->get();
            return response()->json(['blogs'=>$blogs]);
        } else {
            $blogs = $query->get();
            return view('frontend.home.index', compact('blogs'));
        }  
    }
}
