<header>
  <nav class="navbar navbar-light @if(!isset($welcome))fixed-top white scrolling-navbar @endif navbar-expand">
    <div class="container ">
      <logo>
        <a class="navbar-brand" href="{{ route('dashboard') }}">
          @if(isset($welcome))
          <img src="/storage/Icon_light.png" height="40" alt=""> @else
          <img src="/storage/Icon.png" height="40" alt=""> @endif
        </a>
      </logo>
      @if(Auth::check() && !isset($welcome)) 
        <ul class="navbar-nav ml-auto ">
          <li class="nav-item fa-lg d-flex align-items-center ">
            <!-- Basic dropdown -->
            <span class="nav-link ">
              <a data-toggle="modal" data-target="#notifications-modal">
                <span class="fa-layers fa-fw mr-1 ">
                    <i class="fas fa-search text-blue" ></i>                
                </span>
              </a>
            </span>
          </li>
          <li class="nav-item fa-lg d-flex align-items-center ">
            <!-- Basic dropdown -->
            <span class="nav-link ">
              <a data-toggle="modal" data-target="#notifications-modal">
                <span class="fa-layers fa-fw mr-1">
                    <i class="fas fa-fire" style="color:red"></i>
                </span>
              </a>
            </span>
          </li>
          <li class="nav-item fa-lg d-flex align-items-center ">
            <!-- Basic dropdown -->
            <span class="nav-link ">
              <a data-toggle="modal" data-target="#notifications-modal">
                <span class="fa-layers fa-fw mr-1">
                  <i class="far fa-bell "></i>
                  <span class="fa-layers-counter fa-lg mr-1" style="background:tomato; "></span>
                </span>
              </a>
            </span>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('account') }}">
              <div class="label">
                @if(is_null(Auth::user()->avatar)) {{--
                <img src="/storage/default_avatar.gif" alt="Perfil" class="rounded-circle img-fluid"
                  style="width:40px"> --}}
                <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(17)-mini.jpg" style="width:40px" class="rounded-circle avatar-img z-depth-1-half"> @else
                <img src="/storage/{{Auth::user()->id . '/' . 'User-Image.jpg' }}" alt="Perfil" class="rounded-circle z-depth-1" style="width:40px"> @endif {{--
                <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-1-mini.jpg" class="rounded-circle z-depth-1-half"> --}}
              </div>
            </a>
          </li>

        </ul>

      </div>
      {{-- </div> --}}
    @endif
  </nav>
  <!--Navbar-->
</header>
<!-- Modal -->