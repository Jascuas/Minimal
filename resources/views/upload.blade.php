@extends('layouts.master') @section('tittle') Subir imagenes @endsection @section('content')
<section class="mt-4 ">
  <!-- Grid row -->
  <h5 class="text-center">Aqui podras previsualizar y subir una imagen con su titulo. Adelante!</h5>
  <div class="row mt-3">
    <!-- Grid column -->
    <div class="col-12 col-md-10 col-lg-7 mx-auto">
      <!-- Card -->
      <form action="#">
        <div class="card news-card">
          <!-- Heading-->
          <div class="card-body">
            <div class="content">
              <img src="{{ $avatar }}" class="rounded-circle avatar-img z-depth-1-half">{{$user->username}}
            </div>
          </div>
          <!-- Card image-->

          <!-- Card content -->
          <div class="card-body">
             
            <!-- Social meta-->
            <div class="md-form">
              <input placeholder="Añade un titulo a la imagen!" type="text" id="form5" class="form-control">
            </div>
            <button type="submit" class="btn btn-outline-info btn-rounded waves-effect  mt-2">Subir!</button>
            
            <!-- Comment input -->

          </div>
          <!-- Card content -->
        </div>
      </form>
      <!-- Card -->
    </div>
    <!-- Grid column -->
  </div>
  <!-- Grid row -->
</section>

<div class="row justify-content-center">
    <!-- Grid column -->
      <form method="POST" id="avatar-form">
        @csrf
        <div class="modal-body text-center mb-1 ">
          <div id="avatar-alert"></div>
          <div class="col-12 ">
          <div class="image-editor">
              <input type="file" class="cropit-image-input" >
              <div class="error-msg"></div>
            <div class="row">

            <div class="cropit-preview col-12"></div>
          </div>
            <input type="range" class="cropit-image-zoom-input slider my-3">
            <input type="hidden" name="image-data" class="hidden-image-data" />
          </div>
        </div>
            <div class="col-12  ">
                <button class="btn btn-primary text-center bt-sm" id="btn-avatar">Cambiar &nbsp;
                  <i class="far fa-share-square" id="Iavatart"></i>
                </button>
          </div>
        </div>
      </form>
      </div>
@endsection