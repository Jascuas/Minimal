@extends('layouts.master') @section('tittle') Welcome @endsection @section('content')
<div class="mask rgba-gradient d-flex justify-content-center align-items-center">
  <!-- Content -->
  <div class="container content">
    <!--Grid row-->
    <div class="row">
      <!--Grid column-->
      <div class="col-md-6 white-text text-center text-md-left mt-xl-5 mtb-5 wow fadeInLeft" data-wow-delay="0.3s">
        @include('includes.message-block')
        <div id="registro">
          <h1 class="h1-responsive font-weight-bold mt-sm-5">Registrate en nuestra web</h1>
          <hr class="hr-light">
          <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="row justify-content-start">
              <div class="col-md-11 col-lg-6">
                <div class="md-form">
                  <input type="text" id="name" name="name" class="form-control">
                  <label for="name">Nombre</label>
                </div>
              </div>

              <div class="col-md-11 col-lg-6">
                <div class="md-form">
                  <input type="text" id="email" name="email" class="form-control">
                  <label for="email">Email</label>
                </div>
              </div>
              <div class="col-md-11 col-lg-6">
                <div class="md-form">
                  <input type="password" id="password" name="password" class="form-control">
                  <label for="password">Contraseña</label>
                </div>
              </div>

              <div class="col-md-11 col-lg-6">
                <div class="md-form">
                  <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                  <label for="password_confirmation">Confirma la contraseña</label>
                </div>
              </div>
            </div>
            <input type="hidden" name="remember_token" value="{{Session::token()}}">
            <div class="form-group row my-4 justify-content-center">
              <div class="col-md-12 col-lg-12 offset-lg-2 col-auto">
                <button type="submit" class="btn btn-primary mr-lg-4 ">
                  Register
                </button>
                <a class="black-text cambiar small">
                  ¿Ya tienes cuenta?
                </a>
              </div>
            </div>
          </form>
        </div>
        <div id="login" class="d-none ">
          <h1 class="h1-responsive font-weight-bold mt-sm-5">Inicia sesión</h1>
          <hr class="hr-light">
          <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="row">
              <div class="col-md-11 col-lg-6">
                <div class="md-form ">
                  <input type="text" id="email_login" name="email_login" class="form-control" value="{{ old('email') }}">
                  <label for="email_login">Email o Nombre de Usuario</label>
                </div>
              </div>
              <div class="col-md-11 col-lg-6">
                <div class="md-form">
                  <input type="password" id="password_login" name="password_login" class="form-control">
                  <label for="password_login">Contraseña</label>
                </div>
              </div>
            </div>
            <div class=" row py-4 justify-content-start ">
              <div class="col-5 col-xl-3 col-lg-4 col-md-5">
                <button type="submit" class="btn btn-primary ">
                  Login
                </button>
              </div>
              <div class="col-3 col-xl-2 col-lg-3 col-md-3 align-self-center">
                <a class="cambiar black-text small">
                  ¡Regístrate!
                </a>
              </div>
              <div class="col-4 col-xl-4 col-lg-5 col-md-4 align-self-center pr-0">
                <a class="black-text small" href="{{ route('password.request') }}">
                  ¿Olvidaste la contraseña?
                </a>
              </div>
            </div>
            <input type="hidden" name="remember_token" value="{{Session::token()}}">
          </form>
        </div>
      </div>
      <!--Grid column-->
      <!--Grid column-->
      <div class="col-md-6 col-xl-5 mt-xl-5 wow fadeInRight d-flex align-items-center" data-wow-delay="0.3s">
        <img src="https://mdbootstrap.com/img/Mockups/Transparent/Small/admin-new.png" alt="" class="img-fluid">
      </div>
      <!--Grid column-->
    </div>
    <!--Grid row-->
  </div>
  <!-- Content -->
</div>
<!-- Mask & flexbox options-->

@endsection