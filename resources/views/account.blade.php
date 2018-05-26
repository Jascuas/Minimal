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
</section> --}}
<section class="row new-post ">
    <div class="col-12 ">
        <div class="row justify-content-center">
            <div class="col-8 col-sm-4 col-md-3 col-lg-2 col-xl-2 ">
                @if(is_null($user->avatar)) 
                <img src="/storage/default_avatar.gif" alt="" class="rounded-circle img-fluid">
                @else 
                <img src="/storage/{{$user->id . '/' . 'User-Image.jpg' }}" alt="" class="rounded-circle img-fluid">
                @endif 
            </div>
            <div class="col-12 col-sm-6 col-md-5 col-lg-5 col-xl-5 pl-5">
                <div class="row mx-auto pt-3">
                    <div class="col-12">
                        <div class="row ">
                            <div class="col-10 ">
                                <h4>{{$user->name}}</h4>
                            </div>
                           
                            
                            <div class="col-2 ">
                                <button type="button" class="btn btn-secundary " data-toggle="dropdown">
                                    <i class="fas fa-cog"></i>
                                </button>
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
                        </div>
                    </div>
                </div>
                <div class="row mx-auto ">
                    <div class="col-12 ">
                        <small>
                            <cite title="San Francisco, USA">San Francisco, USA
                                <i class="glyphicon glyphicon-map-marker">
                                </i>
                            </cite>
                        </small>
                        <p>
                            <i class="glyphicon glyphicon-envelope"></i>email@example.com
                            <br />
                            <i class="glyphicon glyphicon-globe"></i>
                            <a href="http://www.jquery2dotnet.com">www.jquery2dotnet.com</a>
                            <br />
                            <i class="glyphicon glyphicon-gift"></i>June 02, 1988</p>
                        <!-- Split button -->
                    </div>
                </div>
            </div>
        </div>
</section>
{{-- @if (Storage::disk('local')->has($user->name . '-' . $user->id . '.jpg'))
<section class="row new-post">
    <div class="col-md-6 col-md-offset-3">
        <img src="{{ route('account.image', ['filename' => $user->name . '-' . $user->id . '.jpg']) }}" alt="" class="img-responsive">
    </div>
</section>
@endif --}}

<section>

    <div class="jumbotron author-box px-5 py-4 text-center text-md-left wow fadeIn" data-wow-delay="0.3s" style="visibility: visible; animation-name: fadeIn; animation-delay: 0.3s;">
        <!--Name-->
        <h4 class="font-weight-bold h4 text-center">About author</h4>
        <hr>
        <div class="row">
            <!--Avatar-->
            <div class="col-12 col-sm-2">
                <img src="http://mdbootstrap.com/img/Photos/Avatars/img%20(32).jpg" class="img-fluid rounded-circle z-depth-2">
            </div>
            <!--Author Data-->
            <div class=" col-12 col-sm-10 text-left">
                <p><strong>John Doe</strong></p>
                <div class="personal-sm pb-3">
                    <a class="pr-2 fb-ic"><i class="fa fa-facebook"> </i></a>
                    <a class="pr-2 tw-ic"><i class="fa fa-twitter"> </i></a>
                    <a class="pr-2 gplus-ic"><i class="fa fa-google-plus"> </i></a>
                    <a class="pr-2 li-ic"><i class="fa fa-linkedin"> </i></a>
                </div>
                <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus.</p>
                <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint esse nulla quia quam veniam commodi dicta, iusto inventore. Voluptatum pariatur eveniet ea, officiis vitae praesentium beatae quas libero, esse facere.
                </p>
            </div>
        </div>
    </div>

</section>



@endsection