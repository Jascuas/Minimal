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
                  <input type="text" id="identity" name="identity" class="form-control" value="{{ old('username') ?: old('email') }}">
                  <label for="identity">Email o Nombre de Usuario</label>
                </div>
              </div>
              <div class="col-md-11 col-lg-6">
                <div class="md-form">
                  <input type="password" id="password_login" name="password" class="form-control">
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
                <a class="black-text small" data-toggle="modal" data-target="#forgotpassword">
                  ¿Olvidaste la contraseña?
                </a>
                {{--
                <a class="black-text small" href="{{ route('password.request') }}">
                  ¿Olvidaste la contraseña?
                </a> --}}
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


<!-- Modal -->
<div class="modal fade " id="forgotpassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md " role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Recuperar la contraseña</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center mb-1">
        <p class="small">Podemos ayudarte a cambiar tu contraseña mediante tu nombre de usuario de Minimal o la dirección de correo electrónico
          enlazada a la cuenta.
        </p>
        <form method="POST" action="{{ route('password.email') }}">
          @csrf
          <div class="md-form ml-0 mr-0">
            <input type="email" id="recuperar" name="email" class=" form-control ml-0 modal-color">
            <label for="recuperar" class="ml-0 modal-color">Email</label>
          </div>
          <div class="text-center mt-4">
            <button class="btn btn-cyan waves-effect waves-light">Recuperar
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade " id="resetpassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md " role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cambiar la contraseña</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center mb-1">
        <p class="small">Introduce tu nueva contraseña
        </p>
        <form method="POST" action="{{ route('password.request') }}">
          @csrf
          <input type="hidden" name="token" value="" id="password_token"  >
          <div class="md-form ml-0 mr-0">
            <input type="email" id="reset" name="email" class=" form-control ml-0 modal-color">
            <label for="reset" class="ml-0 modal-color">Email</label>
          </div>
          <div class="md-form ml-0 mr-0">
            <input type="password" id="reset_password" name="password" class=" form-control ml-0 modal-color">
            <label for="reset_password" class="ml-0 modal-color">Nueva contraseña</label>
          </div>
          <div class="md-form ml-0 mr-0">
            <input type="password" id="resetpassword_confirmation" name="password_confirmation" class=" form-control ml-0 modal-color">
            <label for="resetpassword_confirmation" class="ml-0 modal-color">Repetir contraseña</label>
          </div>
          <div class="text-center mt-4">
            <button class="btn btn-cyan waves-effect waves-light">Cambiar
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection