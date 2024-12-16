@extends('front.layouts.master')
@section('content')
       <!-- Page Header-->
       <header class="masthead" style="background-image: url('{{ asset('blogtema') }}/assets/img/home-bg.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>HAKKIMDA</h1>
                        
                    </div>
                </div>
            </div>
        </div>
    </header>
    {{-- <div class="col-12 reklam">
        <div class="alert bg-light shadow-sm alert-dismissible mb-1  text-center">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <a class="" target="_blank" href="https://www.parcaniz.com/"><img width="30%" src="{{ asset('front') }}/assets/img/parcaniz.jpg" alt="" srcset=""></a>
           
        </div>
    </div> --}}
@endsection