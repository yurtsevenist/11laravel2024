@extends('auth.layouts.master')
@section('content')
<div class="register-box"> <!-- /.register-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header"> <a href="#" class="link-dark text-center link-offset-2 link-opacity-100 link-opacity-50-hover">
                <h1 class="mb-0"> <b>Site</b>İsmi
                </h1>
            </a> </div>
        <div class="card-body register-card-body">
            <p class="register-box-msg">Üye Kayıt Formu</p>
            <form action="{{route('registerPost')}}" method="post">
                @csrf
                <div class="input-group mb-1">
                    <div class="form-floating"> 
                        <input id="registerFullName" name="name" required type="text" class="form-control" placeholder=""> <label for="registerFullName">Adınız Soyadınız</label> </div>
                    <div class="input-group-text"> <span class="bi bi-person"></span> </div>
                </div>
                <div class="input-group mb-1">
                    <div class="form-floating"> 
                        <input id="registerEmail" name="email" required type="email" class="form-control" placeholder=""> <label for="registerEmail">E-Posta</label> </div>
                    <div class="input-group-text"> <span class="bi bi-envelope"></span> </div>
                </div>
                <div class="input-group mb-1">
                    <div class="form-floating">
                        <input id="registerPassword" name="password" required type="password" class="form-control" placeholder=""> <label for="registerPassword">Şifre</label> </div>
                    <div class="input-group-text"> <span class="bi bi-lock-fill"></span> </div>
                </div> <!--begin::Row-->
                <div class="input-group mb-1">
                    <div class="form-floating">
                        <input id="registerPassword" name="password_confirmation" required type="password" class="form-control" placeholder=""> <label for="registerPassword">Şifre Tekrar</label> </div>
                    <div class="input-group-text"> <span class="bi bi-lock-fill"></span> </div>
                </div> <!--begin::Row-->
                <div class="row">
                    <div class="col-8 d-inline-flex align-items-center">
                        <div class="form-check"> 
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"> <label class="form-check-label" for="flexCheckDefault">
                                I agree to the <a href="#">terms</a> </label> </div>
                    </div> <!-- /.col -->
                    <div class="col-4">
                        <div class="d-grid gap-2"> <button type="submit" class="btn btn-primary">Sign In</button> </div>
                    </div> <!-- /.col -->
                </div> <!--end::Row-->
            </form>
        
            <p class="mb-0"> <a href="{{route('login')}}" class="link-primary text-center">
                    Zaten üyeyim
                </a> </p>
        </div> <!-- /.register-card-body -->
    </div>
</div> <!-- /.register-box --> <!--begin::Third Party Plugin(OverlayScrollbars)-->
@endsection