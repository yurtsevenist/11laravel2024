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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Http\Request;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function login()
    {
        return view('auth.login');
    }
    public function loginPost(Request $request)
    {
        $request->flash();
       
       
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {                 
           $user=User::whereId(Auth::user()->id)->first();
           $user->updated_at=Carbon::now();   
           $user->save();          
           if(Auth::user()->who==1)
           {              
             return redirect()->route('panel')->with("info","Hoşgeldiniz ".Auth::user()->name);
           }                  
            else
            {
            return redirect()->route('/')->withInfo("Hoşgeldiniz ".Auth::user()->name);
            }                                   
                         
         
       }
       
       return redirect()->route('login')->withErrors('E-Posta Adresiniz veya Şifreniz Hatalı!!');
       
     
    }
    public function dashboard()
    {
        return view('back.dashboard');
    }
    public function logout()
    {
       
        Auth::logout();
        return redirect()->route('/')->withSuccess('Oturum Kapatıldı');
    }
    public function register()
    {
        return view('auth.register');
    }
    public function registerPost(Request $request)
    {
        dd($request);
    }
    public function yetkisiz()
    {
        return view("401");
    }
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
        $ara=Ip::whereBlog_id($blog->id)->whereIp($ip)->whereTur(0)->first();//bu yazı bu ip adresi tarafından daha önce okunmuşmu
        if(!$ara)
        {
            $kayit=new Ip;
            $kayit->ip=$ip;
            $kayit->blog_id=$blog->id;
            $kayit->tur=0;
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
    public function likeBlog(Request $request)
    {
        $ip = $request->getClientIp();     
        $blog=Blog::whereId($request->id)->first();
        $ara=Ip::whereBlog_id($blog->id)->whereIp($ip)->whereTur(1)->first();//bu yazı bu ip adresi tarafından daha önce okunmuşmu
        $tur=0;//0 geri al 1 beğen
        if(!$ara)
        {
            $kayit=new Ip;
            $kayit->ip=$ip;
            $kayit->blog_id=$blog->id;
            $kayit->tur=1;
            $kayit->save();
            $blog->like+=1;
            $blog->save();
            $tur=1;
        }
        else
        {   if($blog->like>0)
            {
                $blog->like-=1;
                $blog->save();
            }
            $tur=0;
            $ara->delete();
        }
        return response()->json([
            'like'=>$blog->like,
            'tur'=>$tur,
        ]);
    }
    
}