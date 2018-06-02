@extends('layouts.master') @section('tittle') Account @endsection @section('content') {{--
<section class="row new-post">
    <div class="col-md-6 col-md-offset-3">
        <header>
            <h3>Your Account</h3>
        </header>
        <form action="{{ route('account.save') }}" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $user->name }}" id="name">
            </div>
            <div class="form-group">
                <label for="image">Image (only .jpg)</label>
                <input type="file" name="image" class="form-control" id="image">
            </div>
            <button type="submit" class="btn btn-primary">Save Account</button>
            <input type="hidden" value="{{ Session::token() }}" name="_token">
        </form>
    </div>
</section> --}} {{-- @if (Storage::disk('local')->has($user->name . '-' . $user->id . '.jpg'))
<section class="row new-post">
    <div class="col-md-6 col-md-offset-3">
        <img src="{{ route('account.image', ['filename' => $user->name . '-' . $user->id . '.jpg']) }}" alt="" class="img-responsive">
    </div>
</section>
@endif --}}

<section>

    <div class="jumbotron author-box px-5 py-4 text-center text-md-left wow fadeIn" data-wow-delay="0.3s" style="visibility: visible; animation-name: fadeIn; animation-delay: 0.3s;">
        <!--Name-->
        <h4 class="font-weight-bold h4 text-center">John Doe</h4>

        <hr>
        <div class="row">
            <!--Avatar-->
            <div class="col-12 col-sm-2">
                @if(is_null($user->avatar))
                <img src="/storage/default_avatar.gif" alt="" class="img-fluid rounded-circle z-depth-2"> @else
                <img src="/storage/{{$user->id . '/' . 'User-Image.jpg' }}" alt="" class="img-fluid rounded-circle z-depth-2"> {{--
                <img src="http://mdbootstrap.com/img/Photos/Avatars/img%20(32).jpg" class="img-fluid rounded-circle z-depth-2"> --}} @endif
            </div>
            <!--Author Data-->
            <div class=" col-12 col-sm-10 text-left">
                <div class="personal-sm pb-3">
                    <a class="pr-2 fb-ic">
                        <i class="fa fa-facebook"> </i>
                    </a>
                    <a class="pr-2 tw-ic">
                        <i class="fa fa-twitter"> </i>
                    </a>
                    <a class="pr-2 gplus-ic">
                        <i class="fa fa-google-plus"> </i>
                    </a>
                    <a class="pr-2 li-ic">
                        <i class="fa fa-linkedin"> </i>
                    </a>
                    <a data-toggle="dropdown">
                        <i class="fas fa-cog fa-lg"></i>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="#">Settings</a>
                        </li>
                        <li>
                            <a href="#">Settings</a>
                        </li>
                        <li>
                            <a href="#">Settings</a>
                        </li>
                        <li>
                            <a href="#">Settings</a>
                        </li>
                    </ul>
                </div>
                <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus.</p>
                <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint esse nulla quia quam veniam commodi dicta,
                    iusto inventore. Voluptatum pariatur eveniet ea, officiis vitae praesentium beatae quas libero, esse
                    facere.
                </p>
            </div>
        </div>
    </div>

</section>

<div class="row d-flex align-items-start ">

    <!--Grid column-->
    <div class="col-lg-4 col-md-12 mb-4">
        <!--Featured image-->
        <div class="view overlay z-depth-2 mb-2">
            <img src="https://scontent-vie1-1.cdninstagram.com/vp/c88a9ff2992290adc595acc201d84387/5BAACBBD/t51.2885-15/e35/23416748_1928821364103491_5785363682636595200_n.jpg"
                class="img-fluid rounded" alt="First sample image">
            <a>
                <div class="mask waves-effect waves-light"></div>
            </a>
        </div>
    </div>
    <!--Grid column-->

    <!--Grid column-->
    <div class="col-lg-4 col-md-6 mb-4">
        <!--Featured image-->
        <div class="view overlay z-depth-2 mb-2">
            <img src="https://mdbootstrap.com/img/Photos/Others/images/43.jpg" class="img-fluid rounded" alt="Second sample image">
            <a>
                <div class="mask waves-effect waves-light"></div>
            </a>
        </div>
    </div>
    <!--Grid column-->

    <!--Grid column-->
    <div class="col-lg-4 col-md-6 mb-4">
        <!--Featured image-->
        <div class="view overlay z-depth-2 mb-2">
            <img src="https://scontent-vie1-1.cdninstagram.com/vp/8084b0cdf8213d6501d873e2c87496cd/5BBB99AF/t51.2885-15/sh0.08/e35/p640x640/23594790_2021382584765447_525153820309716992_n.jpg"
                class="img-fluid rounded" alt="Thrid sample image">
            <a>
                <div class="mask waves-effect waves-light"></div>
            </a>
        </div>
    </div>
    <!--Grid column-->


    <!--Grid column-->
    <div class="col-lg-4 col-md-12 mb-4">
        <!--Featured image-->
        <div class="view overlay z-depth-2 mb-2">
            <img src="https://scontent-vie1-1.cdninstagram.com/vp/8084b0cdf8213d6501d873e2c87496cd/5BBB99AF/t51.2885-15/sh0.08/e35/p640x640/23594790_2021382584765447_525153820309716992_n.jpg"
                class="img-fluid rounded" alt="First sample image">
            <a>
                <div class="mask waves-effect waves-light"></div>
            </a>
        </div>
    </div>
    <!--Grid column-->

    <!--Grid column-->
    <div class="col-lg-4 col-md-6 mb-4">
        <!--Featured image-->
        <div class="view overlay z-depth-2 mb-2">
            <img src="https://scontent-vie1-1.cdninstagram.com/vp/c88a9ff2992290adc595acc201d84387/5BAACBBD/t51.2885-15/e35/23416748_1928821364103491_5785363682636595200_n.jpg"
                class="img-fluid rounded" alt="Second sample image">
            <a>
                <div class="mask waves-effect waves-light"></div>
            </a>
        </div>
    </div>
    <!--Grid column-->

    <!--Grid column-->
    <div class="col-lg-4 col-md-6 mb-4">
        <!--Featured image-->
        <div class="view overlay z-depth-2 mb-2">
            <img src="https://mdbootstrap.com/img/Photos/Others/images/13.jpg" class="img-fluid rounded" alt="Thrid sample image">
            <a>
                <div class="mask waves-effect waves-light"></div>
            </a>
        </div>
    </div>
    <!--Grid column-->

</div>
<div class="row">
        <div class="col-md-12">
    
            <div id="mdb-lightbox-ui"></div>
    
            <div class="mdb-lightbox">
    
                <figure class="col-md-4">
                    <a href="https://mdbootstrap.com/img/Photos/Lightbox/Original/img%20(145).jpg" data-size="1600x1067">
                        <img src="https://scontent-vie1-1.cdninstagram.com/vp/8084b0cdf8213d6501d873e2c87496cd/5BBB99AF/t51.2885-15/sh0.08/e35/p640x640/23594790_2021382584765447_525153820309716992_n.jpg" alt="placeholder" class="z-depth-2 rounded img-fluid">
                    </a>
                </figure>
    
                <figure class="col-md-4">
                    <a href="https://mdbootstrap.com/img/Photos/Lightbox/Original/img%20(150).jpg" data-size="1600x1067">
                        <img src="https://mdbootstrap.com/img/Photos/Lightbox/Thumbnail/img%20(150).jpg" alt="placeholder" class="img-fluid" />
                    </a>
                </figure>
    
                <figure class="col-md-4">
                    <a href="https://mdbootstrap.com/img/Photos/Lightbox/Original/img%20(152).jpg" data-size="1600x1067">
                        <img src="https://scontent-vie1-1.cdninstagram.com/vp/c88a9ff2992290adc595acc201d84387/5BAACBBD/t51.2885-15/e35/23416748_1928821364103491_5785363682636595200_n.jpg" alt="placeholder" class="img-fluid" />
                    </a>
                </figure>
    
                <figure class="col-md-4">
                    <a href="https://mdbootstrap.com/img/Photos/Lightbox/Original/img%20(42).jpg" data-size="1600x1067">
                        <img src="https://scontent-vie1-1.cdninstagram.com/vp/8084b0cdf8213d6501d873e2c87496cd/5BBB99AF/t51.2885-15/sh0.08/e35/p640x640/23594790_2021382584765447_525153820309716992_n.jpg" alt="placeholder" class="img-fluid" />
                    </a>
                </figure>
    
                <figure class="col-md-4">
                    <a href="https://mdbootstrap.com/img/Photos/Lightbox/Original/img%20(151).jpg" data-size="1600x1067">
                        <img src="https://mdbootstrap.com/img/Photos/Lightbox/Thumbnail/img%20(151).jpg" alt="placeholder" class="img-fluid" />
                    </a>
                </figure>
    
                <figure class="col-md-4">
                    <a href="https://mdbootstrap.com/img/Photos/Lightbox/Original/img%20(40).jpg" data-size="1600x1067">
                        <img src="https://mdbootstrap.com/img/Photos/Lightbox/Thumbnail/img%20(40).jpg" alt="placeholder" class="img-fluid" />
                    </a>
                </figure>
    
                <figure class="col-md-4">
                    <a href="https://mdbootstrap.com/img/Photos/Lightbox/Original/img%20(148).jpg" data-size="1600x1067">
                        <img src="https://mdbootstrap.com/img/Photos/Lightbox/Thumbnail/img%20(148).jpg" alt="placeholder" class="img-fluid" />
                    </a>
                </figure>
    
                <figure class="col-md-4">
                    <a href="https://mdbootstrap.com/img/Photos/Lightbox/Original/img%20(147).jpg" data-size="1600x1067">
                        <img src="https://mdbootstrap.com/img/Photos/Lightbox/Thumbnail/img%20(147).jpg" alt="placeholder" class="img-fluid" />
                    </a>
                </figure>
    
                <figure class="col-md-4">
                    <a href="https://mdbootstrap.com/img/Photos/Lightbox/Original/img%20(149).jpg" data-size="1600x1067">
                        <img src="https://mdbootstrap.com/img/Photos/Lightbox/Thumbnail/img%20(149).jpg" alt="placeholder" class="img-fluid" />
                    </a>
                </figure>
    
            </div>
    
        </div>
    </div>
@endsection