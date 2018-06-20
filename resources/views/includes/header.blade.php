<header>
  <nav class="navbar navbar-light @if(!isset($welcome))fixed-top white scrolling-navbar @endif navbar-expand">
    <div class="container ">
      <logo>
        <a class="navbar-brand" href="{{ route('home') }}">
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
              <a data-toggle="modal" data-target="#buscar-modal" class="buscar">
                <span class="fa-layers fa-fw mr-1 ">
                    <i class="fas fa-search" ></i>                
                </span>
              </a>
            </span>
          </li>
          <ul class="navbar-nav ml-auto ">
            <li class="nav-item fa-lg d-flex align-items-center ">
              <!-- Basic dropdown -->
              <span class="nav-link ">
                <a class="nav-link" href="{{ route('subir') }}">
                  <span class="fa-layers   fa-fw mr-1 ">
                      <i class="far fa-plus-square" ></i>                
                  </span>
                </a>
              </span>
            </li>
          <li class="nav-item fa-lg d-flex align-items-center ">
            <!-- Basic dropdown -->
            <span class="nav-link ">
              <a class="nav-link" href="{{ route('explora') }}">
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
            <a class="nav-link" href="{{ route('account')}}">
              <div class="label">
                <img src="{{ $avatar }}" style="width:40px" class="rounded-circle avatar-img z-depth-1-half"> 
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