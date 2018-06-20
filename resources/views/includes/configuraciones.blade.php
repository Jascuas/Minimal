<div class="modal fade " id="configuraciones-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md " role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title">Configuracion y opciones de la cuenta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center mb-1 ">
        <ul class="list-unstyled ">
          <li>
            <span data-toggle="modal" data-target="#configuraciones-modal">
              <a class="nav-link resetModal" data-toggle="modal" href="#username-modal">Cambiar nombre de usuario</a>
            </span>
          </li>
          <li>
            <span data-toggle="modal" data-target="#configuraciones-modal">
              <a class="nav-link resetModal" data-toggle="modal" href="#avatar-modal">Cambiar foto de perfil</a>
            </span>
          </li>
          <li>
            <span data-toggle="modal" data-target="#configuraciones-modal">
              <a class="nav-link resetModal" data-toggle="modal" href="#biografia-modal">Actualizar biografia</a>
            </span>
          </li>
          <li>
            <span data-toggle="modal" data-target="#configuraciones-modal">
              <a class="nav-link" href="{{ route('logout') }}">Salir de la cuenta</a>
            </span>
          </li>
          <li>
            <span data-toggle="modal" data-target="#configuraciones-modal">
              <a class="nav-link red-text" data-toggle="modal" href="#borrar-modal">Borrar cuenta</a>
            </span>
          </li>
          <li>
            <a class="nav-link" href="#">...</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="modal fade " id="username-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md " role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title">
          <span data-toggle="modal" data-target="#configuraciones-modal">
            <a class="nav-link d-inline" data-toggle="modal" data-target="#username-modal">
              <i class="fas fa-angle-left" style="color:gray"></i>
            </a>
          </span>Cambiar nombre de usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <div id="username-alert"></div>
        <div class="small">¿Quieres cambiarte el nombre de usuario? Estas en el lugar adecuado.</div>
        <form method="POST" id="username-form">
          @csrf
          <div class="md-form ml-0 mr-0">
            <input type="text" id="username" name="username" class="validate form-control ml-0 modal-color" required value="{{$user->username}}">
            <label for="username" class="ml-0 modal-color">Nuevo nombre de usuario</label>
          </div>
          <div class="text-center mt-4">
            <button class="btn btn-primary text-center" id="btn-username">Cambiar &nbsp;
              <i class="far fa-share-square" id="Iusername"></i>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade " id="avatar-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md " role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title">
          <span data-toggle="modal" data-target="#configuraciones-modal">
            <a class="nav-link d-inline" data-toggle="modal" data-target="#avatar-modal">
              <i class="fas fa-angle-left" style="color:gray"></i>
            </a>
          </span>Cambiar foto de perfil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="row ">
        <!-- Grid column -->
          <form method="POST" id="avatar-form">
            @csrf
            <div class="modal-body text-center mb-1 ">
              <div id="avatar-alert"></div>
              <div class="col-12 ">
              <div class="image-editor">
                <input type="file" class="cropit-image-input" >
                <div class="error-msg"></div>
                <div class="cropit-preview "></div>
                <input type="range" class="cropit-image-zoom-input slider d-flex justify-content-start my-3">
                <input type="hidden" name="image-data" class="hidden-image-data" />
              </div>
            </div>
                <div class="col-12 d-flex justify-content-start">
                    <button class="btn btn-primary text-center bt-sm" id="btn-avatar">Cambiar &nbsp;
                      <i class="far fa-share-square" id="Iavatart"></i>
                    </button>
              </div>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade " id="biografia-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md " role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title">
          <span data-toggle="modal" data-target="#configuraciones-modal">
            <a class="nav-link d-inline" data-toggle="modal" data-target="#biografia-modal">
              <i class="fas fa-angle-left" style="color:gray"></i>
            </a>
          </span>Actualizar biografia</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center mb-1">
        <div id="biografia-alert"></div>
        <div class="small">¡Cuentanos sobre tí!</div>
        <form method="POST" id="biografia-form">
          @csrf
          <div class="md-form ml-0 mr-0">
            <textarea type="text" rows="3" id="biografia_text" name="biografia" class="md-textarea validate form-control ml-0 modal-color black-text"
              required>{{$biografia}}</textarea>
            <label for="biografia" class="ml-0 modal-color">Escribe sobre tí!</label>
          </div>
          <div class="text-center mt-4">
            <button class="btn btn-primary text-center " id="btn-biografia">Actualizar &nbsp;
              <i class="far fa-share-square" id="Ibiografia"></i>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="borrar-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-md" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <h4 class="modal-title w-100">
          <span data-toggle="modal" data-target="#configuraciones-modal">
            <a class="nav-link d-inline" data-toggle="modal" data-target="#borrar-modal">
              <i class="fas fa-angle-left" style="color:gray"></i>
            </a>
          </span>¿Seguro que quieres borrar la cuenta?</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <!--Body-->
      <div class="modal-body mx-auto">
        <div id="forgot-alert"></div>
        <div class="small">No habra vuelta a atras.</div>
        <button type="button" class="btn btn-outline-danger waves-effect">
          <a href="{{route('account.borrar')}}" class="red-text">Borrar</a>
        </button>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>