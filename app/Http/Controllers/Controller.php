<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Blog;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function main()
    {
        $blogs=Blog::orderBy('created_at','desc')->take(5)->get();
        return view('front.main',compact('blogs'));
    }
    public function about()
    {
        return view('front.about');//front klasörü içindeki about.blade.php
    }
    public function contact()
    {
        return view('front.contact');
    }
    public function blog()
    {   
        $blogs=Blog::orderBy('created_at','desc')->paginate(10);
        return view('front.blog',compact('blogs'));
    }
}
