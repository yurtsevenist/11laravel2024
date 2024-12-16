@extends('auth.layouts.master')
@section('content')
<div class="card card-outline card-primary">
    <div class="card-header"> <a href="#" class="link-dark text-center link-offset-2 link-opacity-100 link-opacity-50-hover">
            <h1 class="mb-0"> <b>Admin</b>LTE
            </h1>
        </a> </div>
    <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <form action="{{route('loginPost')}}" method="post">
            @csrf
            <div class="input-group mb-1">
                <div class="form-floating"> 
                    <input id="loginEmail" required type="email" class="form-control" value="" name="email" placeholder=""> 
                    <label for="loginEmail">Email</label> </div>
                <div class="input-group-text"> <span class="bi bi-envelope"></span> </div>
            </div>
            <div class="input-group mb-1">
                <div class="form-floating"> <input id="loginPassword" type="password" 
                    name="password" required class="form-control" placeholder=""> <label for="loginPassword">Password</label> </div>
                <div class="input-group-text"> <span class="bi bi-lock-fill"></span> </div>
            </div> <!--begin::Row-->
            <div class="row">
                <div class="col-8 d-inline-flex align-items-center">
                    <div class="form-check"> <input class="form-check-input" type="checkbox" name="remember"  id="flexCheckDefault"> <label class="form-check-label" for="flexCheckDefault">
                            Remember Me
                        </label> </div>
                </div> <!-- /.col -->
                <div class="col-4">
                    <div class="d-grid gap-2"> <button type="submit" class="btn btn-primary">Giriş Yap</button> </div>
                </div> <!-- /.col -->
            </div> <!--end::Row-->
        </form>       
        <p class="mb-1"> <a href="forgot-password.html">I forgot my password</a> </p>
        <p class="mb-0"> <a href="{{route('register')}}" class="text-center">
                Yeni Üye
            </a> </p>
    </div> <!-- /.login-card-body -->
</div>   
@endsection


   
  