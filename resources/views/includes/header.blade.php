<header>
  <nav class="navbar navbar-light navbar-expand-lg">
    <div class="container ">
      <logo>
        <a class="navbar-brand" href="{{ route('dashboard') }}">
          @if(isset($welcome))
          <img src="/storage/Icon_light.png" height="40" alt=""> @else
          <img src="/storage/Icon.png" height="40" alt=""> @endif
        </a>
      </logo>
      @if(Auth::check() && !isset($welcome))
      {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-7" aria-controls="navbarSupportedContent-7"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent-7"> --}}
        <ul class="navbar-nav ml-auto ">
          <!-- Authentication Links -->
          <li class="nav-item">
            <a class="nav-link" href="{{ route('account') }}" >
                <div class="label">
                  @if(is_null(Auth::user()->avatar)) 
                  <img src="/storage/default_avatar.gif" alt="Perfil" class="rounded-circle img-fluid" style="width:40px">
                  @else 
                  <img src="/storage/{{Auth::user()->id . '/' . 'User-Image.jpg' }}" alt="Perfil" class="rounded-circle z-depth-1" style="width:40px">
                  @endif  
                    {{-- <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-1-mini.jpg" class="rounded-circle z-depth-1-half"> --}}
                </div>
            </a>
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
          <li class="nav-item d-flex align-items-center">
            <a class="nav-link" href="{{ route('logout') }}">
              <i class="fas fa-sign-out-alt"></i>
            </a>
          </li>
        </ul>
         {{--
        <form class="form-inline">
          <div class="md-form mt-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          </div>
        </form> --}}
      </div>
    {{-- </div> --}}
    @endif
  </nav>
  <!--Navbar-->
</header>
<!-- Modal -->
<div class="modal fade right" id="notifications-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-side modal-top-right" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Notificaciones</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <!-- Section: Social newsfeed v.1 -->
        <section class="my-5">

          <!-- Grid row -->
          <div class="row">

            <!-- Grid column -->
            <div class="col-md-12">

              <!-- Newsfeed -->
              <div class="mdb-feed">

                <!-- First news -->
                <div class="news">

                  <!-- Label -->
                  <div class="label">
                    <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-1-mini.jpg" class="rounded-circle z-depth-1-half">
                  </div>

                  <!-- Excerpt -->
                  <div class="excerpt">

                    <!-- Brief -->
                    <div class="brief">
                      <a class="name">John Doe</a> added you as a friend
                      <div class="date">1 hour ago</div>
                    </div>

                    <!-- Feed footer -->
                    <div class="feed-footer">
                      <a class="like">
                        <i class="fa fa-heart"></i>
                        <span>5 likes</span>
                      </a>
                    </div>

                  </div>
                  <!-- Excerpt -->

                </div>
                <!-- First news -->

                <!-- Second news -->
                <div class="news">

                  <!-- Label -->
                  <div class="label">
                    <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(17)-mini.jpg" class="rounded-circle z-depth-1-half">
                  </div>

                  <!-- Excerpt -->
                  <div class="excerpt">

                    <!-- Brief -->
                    <div class="brief">
                      <a class="name">Anna Smith</a> added
                      <a> 2 new illustrations</a>
                      <div class="date">4 hours ago</div>
                    </div>

                    <!-- Added images -->
                    <div class="added-images">
                      <img src="https://mdbootstrap.com/img/Photos/Others/images/71.jpg" class="z-depth-1 rounded mb-md-0 mb-2">
                      <img src="https://mdbootstrap.com/img/Photos/Others/images/74.jpg" class="z-depth-1 rounded">
                    </div>

                    <!-- Feed footer -->
                    <div class="feed-footer">
                      <a class="like">
                        <i class="fa fa-heart"></i>
                        <span>18 likes</span>
                      </a>
                    </div>

                  </div>
                  <!-- Excerpt -->

                </div>
                <!-- Second news -->

                <!-- Third news -->
                <div class="news">

                  <!-- Label -->
                  <div class="label">
                    <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(9)-mini.jpg" class="rounded-circle z-depth-1-half">
                  </div>

                  <!-- Excerpt -->
                  <div class="excerpt">

                    <!-- Brief -->
                    <div class="brief">
                      <a class="name">Danny Moore</a> added you as a friend
                      <div class="date">7 hours ago</div>
                    </div>

                    <!-- Feed footer -->
                    <div class="feed-footer">
                      <a class="like">
                        <i class="fa fa-heart"></i>
                        <span>11 likes</span>
                      </a>
                    </div>

                  </div>
                  <!-- Excerpt -->

                </div>
                <!-- Third news -->

                <!-- Fourth news -->
                <div class="news">

                  <!-- Label -->
                  <div class="label">
                    <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(18)-mini.jpg" class="rounded-circle z-depth-1-half">
                  </div>

                  <!-- Excerpt -->
                  <div class="excerpt">

                    <!-- Brief -->
                    <div class="brief">
                      <a class="name">Lili Rose</a> posted on his page
                      <div class="date">2 days ago</div>
                    </div>

                    <!-- Added text -->
                    <div class="added-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero inventore, iste quas libero eius? Vitae
                      sint neque animi alias sunt dolor, accusantium ducimus, non placeat voluptate.</div>

                    <!-- Feed footer -->
                    <div class="feed-footer">
                      <a class="like">
                        <i class="fa fa-heart"></i>
                        <span>7 likes</span>
                      </a>
                    </div>

                  </div>
                  <!-- Excerpt -->

                </div>
                <!-- Fourth news -->

                <!-- Fifth news -->
                <div class="news">

                  <!-- Label -->
                  <div class="label">
                    <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(20)-mini.jpg" class="rounded-circle z-depth-1-half">
                  </div>

                  <!-- Excerpt -->
                  <div class="excerpt mb-0">

                    <!-- Brief -->
                    <div class="brief">
                      <a class="name">Kate Harrison</a> added
                      <a> 2 new photos</a> of you
                      <div class="date">3 days ago</div>
                    </div>

                    <!-- Added images -->
                    <div class="added-images">
                      <img src="https://mdbootstrap.com/img/Photos/Others/images/29.jpg" class="z-depth-1 rounded mb-md-0 mb-2">
                      <img src="https://mdbootstrap.com/img/Photos/Others/images/31.jpg" class="z-depth-1 rounded">
                    </div>

                    <!-- Feed footer -->
                    <div class="feed-footer">
                      <a class="like">
                        <i class="fa fa-heart"></i>
                        <span>53 likes</span>
                      </a>
                    </div>

                  </div>
                  <!-- Excerpt -->

                </div>
                <!-- Fifth news -->

              </div>
              <!-- Newsfeed -->

            </div>
            <!-- Grid column -->

          </div>
          <!-- Grid row -->

        </section>
        <!-- Section: Social newsfeed v.1 -->

      </div>
    </div>
  </div>
</div>