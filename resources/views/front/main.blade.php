@extends('front.layouts.master')
@section('content')   
        <!-- Page Header-->
        <header class="masthead" style="background-image: url('{{ asset('blogtema') }}/assets/img/home-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1>Mustafa YURTSEVEN</h1>
                            <span class="subheading">Aradığınız ne varsa bu sitede</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-12 col-lg-10 col-xl-9">
                    <div class="row">
                    @foreach ($blogs as $blog )
                         <!-- Post preview-->
                      <div class="col-md-4">
                        <img src="{{$blog->image}}"  class="img-fluid pt-5" alt="...">
                      </div>
                      <div class="col-md-8">
                        <div class="post-preview">
                            <a href="post.html">
                                <h2 class="post-title">{{$blog->title}}</h2>
                                <h3 class="post-subtitle">{{Str::words($blog->content,20)}}</h3>
                            </a>
                            <p class="post-meta">
                                Yazar
                                <a href="#!">{{$blog->author}}</a>
                                 {{-- {{Carbon\Carbon::parse($blog->created_at)->format('d.m.Y H:i')}} --}}
                                 {{$blog->created_at->diffForHumans()}}
                            </p>
                        </div>
                      </div>
                    <!-- Divider-->
                    <hr class="my-4" />  
                    @endforeach                
                    </div>
                  
          
                    <!-- Pager-->
                    <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="{{route('blog')}}">Daha Fazla →</a></div>
                </div>
            </div>
        </div>
        @endsection      