<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Blog;
use App\Models\Ip;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Http\Request;
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
    public function blogdetay($slug,$id,Request $request)
    {
        $ip = $request->getClientIp();     
        $blog=Blog::whereId($id)->first();
        $ara=Ip::whereBlog_id($blog->id)->whereIp($ip)->first();//bu yazı bu ip adresi tarafından daha önce okunmuşmu
        if(!$ara)
        {
            $kayit=new Ip;
            $kayit->ip=$ip;
            $kayit->blog_id=$blog->id;
            $kayit->save();
            $blog->hit+=1;
            $blog->save();
        }
        $blogs=Blog::whereAuthor($blog->author)->orderBy('created_at','DESC')->get();
        return view('front.post',compact('blog','blogs'));
    }
    public function yazardetay($slug)
    {
        $yazar=Str::title(str_replace('-', ' ', $slug));
        $blogs=Blog::where('author',$yazar)->orderBy('created_at','DESC')->paginate(10);
        return view('front.blog',compact('blogs'));
    }
    
}
