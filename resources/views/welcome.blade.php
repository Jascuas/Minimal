@extends('layouts.master') @section('tittle') Welcome @endsection @section('content')
<div class="mask rgba-gradient d-flex justify-content-center align-items-center">
  <!-- Content -->
  <div class="container content ">
    <!--Grid row-->
    <div class="row">
      <!--Grid column-->
      <div id="fadeleft" class="col-md-6 white-text text-center text-md-left mt-xl-5 mtb-5 wow fadeInLeft" data-wow-delay="0.3s">
        <blockquote class="blockquote d-none" id="alertas"></blockquote>
        <div id="registro">
          <h1 class="h1-responsive font-weight-bold mt-sm-5">Registrate en nuestra web</h1>
          <hr class="hr-light">
          <form method="POST" id="register-form">
            @csrf
            <div class="row justify-content-start">
              <div class="col-md-11 col-lg-6">
                <div class="md-form">
                  <input type="text" id="name" name="name" class="form-control validate" required>
                  <label for="name">Nombre</label>
                </div>
              </div>
              <div class="col-md-11 col-lg-6">
                <div class="md-form">
                  <input type="email" id="email" name="email" class="form-control validate" required>
                  <label for="email">Email</label>
                </div>
              </div>
              <div class="col-md-11 col-lg-6">
                <div class="md-form">
                  <input type="password" id="password" name="password" class="form-control validate" required>
                  <label for="password">Contraseña</label>
                </div>
              </div>
              <div class="col-md-11 col-lg-6">
                <div class="md-form">
                  <input type="password" id="password_confirmation" name="password_confirmation" class="form-control validate" required>
                  <label for="password_confirmation">Confirma la contraseña</label>
                </div>
              </div>
            </div>
            <div class="form-group row my-4 justify-content-center">
              <div class="col-md-12 col-lg-12 offset-lg-2 col-auto">
                <button class="btn btn-primary mr-lg-4 " id="btn-register">
                  Registrate &nbsp;
                  <i class="far fa-share-square" id="Iregister"></i>
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
          <form method="POST" id="login-form">
            @csrf
            <div class="row">
              <div class="col-md-11 col-lg-6">
                <div class="md-form ">
                  <input type="text" id="identity" name="identity" class="form-control validate" value="{{ old('username') ?: old('email') }}">
                  <label for="identity">Email o Nombre de Usuario</label>
                </div>
              </div>
              <div class="col-md-11 col-lg-6">
                <div class="md-form">
                  <input type="password" id="password_login" name="password" class="form-control validate">
                  <label for="password_login">Contraseña</label>
                </div>
              </div>
            </div>
            <div class="form-group row py-4 justify-content-around">
              <div class="col-6 col-xl-5 col-lg-5 col-md-6 px-0">
                <button type="submit" class="btn btn-primary text-center" id="btn-login">
                  Entra&nbsp;
                  <i class="far fa-share-square" id="Ilogin"></i>
                </button>
              </div>
              <div class="col-3 col-xl-2 col-lg-2 col-md-2 text-center align-self-center px-0 ">
                <a class="cambiar black-text small">
                  ¡Regístrate!
                </a>
              </div>
              <div class="col-3 col-xl-4 col-lg-5 col-md-4 text-center align-self-center px-0 ">
                <a class="black-text small" data-toggle="modal" data-target="#forgot-modal">
                  ¿Olvidaste la contraseña?
                </a>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!--Grid column-->
      <!--Grid column-->
      <div id="faderight" class="col-md-6 col-xl-5 mt-xl-5 wow fadeInLeft d-none d-md-block" data-wow-delay="0.5s">
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
<div class="modal fade " id="forgot-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md " role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Recuperar la contraseña</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center mb-1">
        <div id="forgot-alert"></div>
        <div class="small">Podemos ayudarte a cambiar tu contraseña mediante tu dirección de correo electrónico enlazada a la cuenta de Minimal.
        </div>
        <form method="POST" id="forgot-form">
          @csrf
          <div class="md-form ml-0 mr-0">
            <input type="email" id="forgot" name="email" class="validate form-control ml-0 modal-color" required>
            <label for="forgot" class="ml-0 modal-color">Email</label>
          </div>
          <div class="text-center mt-4">
            <button class="btn btn-primary text-center" id="btn-forgot">Recuperar &nbsp;
              <i class="far fa-share-square" id="Iforgot"></i>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade " id="reset-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md " role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cambiar la contraseña</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center mb-1">
        <div id="reset-alert"></div>
        <div class="small" id="text-reset">
        </div>
        <form method="POST" id="reset-form">
          @csrf
          <input type="hidden" name="token" value="" id="password_token">
          <input type="hidden" name="email" value="" id="resetemail">
          <div class="md-form ml-0 mr-0">
            <input type="password" id="reset_password" name="password" class="validate form-control ml-0 modal-color" required>
            <label for="reset_password" class="ml-0 modal-color">Nueva contraseña</label>
          </div>
          <div class="md-form ml-0 mr-0">
            <input type="password" id="resetpassword_confirmation" name="password_confirmation" class="validate form-control ml-0 modal-color"
              required>
            <label for="resetpassword_confirmation" class="ml-0 modal-color">Repetir contraseña</label>
          </div>
          <div class="text-center mt-4">
            <button class="btn btn-primary text-center" id="btn-reset">Confirmar &nbsp;
              <i class="far fa-share-square" id="Ireset"></i>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
  var urlRegister = '{{route('register')}}';
  var urlLogin = '{{route('login')}}';
  var urlhome = '{{route('home')}}';
  var urlForgot = '{{route('password.email')}}';
  var urlReset = '{{route('password.request')}}';

</script>
@endsection