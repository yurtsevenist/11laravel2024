@extends('front.layouts.master')
@section('content')
       <!-- Page Header-->
       <header class="masthead" style="background-image: url('{{$blog->image}}')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>{{$blog->title}}</h1>
                        
                    </div>
                </div>
            </div>
        </div>
    </header>
            <!-- Post Content-->
            <article class="mb-4">
                <div class="container px-4 px-lg-5">
                    <div class="row gx-4 gx-lg-5 justify-content-center">
                        <div class="col-md-8">
                           <p>{{$blog->content}}</p>
                           <p class="post-meta">
                            <div class="row">
                                <div class="col-8">
                                    Yazar:
                                    <a class="text-decoration-none text-info" href="{{route('yazar-detay',Str::slug($blog->author))}}">{{$blog->author}}</a>
                                     {{-- {{Carbon\Carbon::parse($blog->created_at)->format('d.m.Y H:i')}} --}}
                                    Blog Tarihi: {{$blog->created_at->diffForHumans()}} 
                                </div>
                                <div class="col-4">
                                     <a class="ml-1 border rounded p-2" href=""><i class=" bi bi-hand-thumbs-up fs-5"></i>&nbsp; {{$blog->like}}</a> 
                                     <a class="ml-1 border rounded p-2" href=""><i class=" bi bi-eye fs-5"></i>&nbsp; {{$blog->hit}}</a>                                      
                                </div>
                            </div>
                        </p>
                        </div>
                        <div class="col-4  mt-2">
                            <h5 class="text-center">Yazarın Diğer Yazıları</h5>                     
                            <ul class="list-group text-left">
                                @foreach ($blogs as $blog )
                                <li class="list-group-item text-left">
                                    <a href="{{route('blog-detay',[Str::slug($blog->title),$blog->id])}}">{{Str::words($blog->title,5)}}</a>
                                </li>
                                @endforeach                               
                                
                              </ul>
                        </div>
                    </div>
                </div>
            </article>
@endsection