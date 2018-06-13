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

<section class="mt-5">
    <div class="jumbotron author-box  wow fadeIn" data-wow-delay="0.3s" style="visibility: visible; animation-name: fadeIn; animation-delay: 0.3s;">
        <!--Name-->
        <div class="row">
            <div class="col-12 col-sm-12">
                <div class="row mb-3 justify-content-center ">
                    <div class="col-5 col-sm-2">
                        @if(is_null($user->avatar))
                        <img src="/storage/default_avatar.gif" alt="" class="card-img-top img-fluid rounded-circle  z-depth-2 "> @else
                        <img src="/storage/{{$user->id . '/' . 'User-Image.jpg' }}" alt="" class="card-img-top img-fluid rounded z-depth-2 rounded z-depth-2-circle "> {{--
                        <img src="http://mdbootstrap.com/img/Photos/Avatars/img%20(32).jpg" class="card-img-top img-fluid rounded z-depth-2 rounded z-depth-2-circle "> --}} @endif
                    </div>
                    <div class="col-12 col-sm-10  align-self-center ">
                        <h4 class="font-weight-bold h5 ">John Doe
                            <a data-toggle="dropdown">
                                <i class="fas fa-cog "></i>
                            </a>
                        </h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint esse nulla quia quam veniam commodi
                            dicta, iusto inventore. Voluptatum pariatur eveniet ea, officiis vitae praesentium beatae quas
                            libero, esse facere.
                        </p>
                    </div>
                </div>
                <hr>
            </div>
            <div class="col-12 col-sm-12 align-self-center">
                <a class="pr-2 fb-ic">Publicaciones 12</a>
                <a class="pr-2 tw-ic"> Seguidores 223</a>
                <a class="pr-2 gplus-ic"> Seguidos 156</a>
            </div>
        </div>
    </div>
</section>
<div class="row profile">
    <div class="col-4 col-md-3 col-xl-3 images-profile mt-3 mt-md-4 mt-xl-4">
        <img class="card-img-top img-fluid rounded z-depth-2 " src="//placehold.it/800x600" alt=" image cap">
    </div>
    <div class="col-4 col-md-3 col-xl-3 images-profile mt-3 mt-md-4 mt-xl-4">
        <img class="card-img-top img-fluid rounded z-depth-2" src="//placehold.it/800x600" alt=" image cap">
    </div>
    <div class="col-4 col-md-3 col-xl-3 images-profile mt-3 mt-md-4 mt-xl-4">
        <img class="card-img-top img-fluid rounded z-depth-2" src="//placehold.it/800x600/888/000" alt=" image cap">
    </div>
    <div class="col-4 col-md-3 col-xl-3 images-profile mt-3 mt-md-4 mt-xl-4">
        <img class="card-img-top img-fluid rounded z-depth-2" src="//placehold.it/800x600" alt=" image cap">
    </div>
    <div class="col-4 col-md-3 col-xl-3 images-profile mt-3 mt-md-4 mt-xl-4">
        <img class="card-img-top img-fluid rounded z-depth-2" src="//placehold.it/800x600" alt=" image cap">
    </div>
    <div class="col-4 col-md-3 col-xl-3 images-profile mt-3 mt-md-4 mt-xl-4">
        <img class="card-img-top img-fluid rounded z-depth-2" src="//placehold.it/800x600" alt=" image cap">
    </div>
</div>

@endsection