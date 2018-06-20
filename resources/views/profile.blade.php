@extends('layouts.master') @section('tittle') Account @endsection @section('content') 

<section class="mt-5">
    <div class="jumbotron author-box  wow fadeIn" data-wow-delay="0.3s" style="visibility: visible; animation-name: fadeIn; animation-delay: 0.3s;">
        <!--Name-->
        <div class="row">
            <div class="col-12 col-sm-12">
                <div class="row mb-3 justify-content-center ">
                    <div class="col-5 col-sm-2 mb-2">
                        <img src="{{ $avatar_perfil }}" alt="" class="card-img-top img-fluid rounded-circle  z-depth-2 ">
                    </div>
                    <div class="col-12 col-sm-10 text-sm-left text-center">
                        <h4 class="font-weight-bold h5 d-inline"> {{$user->username}}</h4>
                        <button type="button" class="btn btn-outline-info btn-rounded waves-effect btn-sm" value="{{$button}}" id="follow-button">{{$button}}</button>
                        <p class=" text-left" id="biografia">{{$biografia}}</p>
                    </div>
                </div>
                <hr>
            </div>
            <div class="col-12 col-sm-12 text-center text-sm-left">
                <a class="pr-2 small"><strong>Publicaciones </strong>12</a>
                <a class="pr-2 small"><strong> Seguidores </strong><p class="d-inline" id="followersCount">{{$followersCount}}</p></a>
                <a class="small"><strong> Seguidos </strong><p class="d-inline" id="followingCount">{{$followingsCount}}</p></a>
            </div>
        </div>
    </div>
</section>
<div class="row profile mb-5">
    <div class="col-4 col-md-3 col-xl-3 images-profile mt-3 mt-md-4 mt-xl-4">
        <img class="card-img-top img-fluid rounded z-depth-2 " src="https://instagram.fbud1-1.fna.fbcdn.net/vp/1aebc8ae71c4be73361a865c04dd3257/5BA7F0B2/t51.2885-15/e35/34332060_216941815784587_5293525214972346368_n.jpg"
            alt=" image cap">
    </div>
    <div class="col-4 col-md-3 col-xl-3 images-profile mt-3 mt-md-4 mt-xl-4">
        <img class="card-img-top img-fluid rounded z-depth-2" src="https://instagram.fbud1-1.fna.fbcdn.net/vp/674cbe5c5881f29c1b26600ddab674b4/5BA9DDE6/t51.2885-15/e35/30076327_567653406967357_1250583567654715392_n.jpg"
            alt=" image cap">
    </div>
    <div class="col-4 col-md-3 col-xl-3 images-profile mt-3 mt-md-4 mt-xl-4">
        <img class="card-img-top img-fluid rounded z-depth-2" src="https://instagram.fbud1-1.fna.fbcdn.net/vp/dfdbb857c0f2f25d2f019e2f21b69f0a/5BC40CA0/t51.2885-15/e35/16464436_978706958897133_4000161333508046848_n.jpg"
            alt=" image cap">
    </div>
    <div class="col-4 col-md-3 col-xl-3 images-profile mt-3 mt-md-4 mt-xl-4">
        <img class="card-img-top img-fluid rounded z-depth-2" src="https://instagram.fbud1-1.fna.fbcdn.net/vp/8e1d46068442a87d3caed04eb1555378/5BA7BC91/t51.2885-15/e35/17586734_1843129959260141_5619360413507387392_n.jpg"
            alt=" image cap">
    </div>
    <div class="col-4 col-md-3 col-xl-3 images-profile mt-3 mt-md-4 mt-xl-4">
        <img class="card-img-top img-fluid rounded z-depth-2" src="https://instagram.fbud1-1.fna.fbcdn.net/vp/2e21a6b43844cb6206451e4049578b07/5BA779A9/t51.2885-15/e35/26154003_160577884566334_5342453658502037504_n.jpg"
            alt=" image cap">
    </div>
    <div class="col-4 col-md-3 col-xl-3 images-profile mt-3 mt-md-4 mt-xl-4">
        <img class="card-img-top img-fluid rounded z-depth-2" src="https://instagram.fbud1-1.fna.fbcdn.net/vp/d3d8540f72ba18d5c200d61e8cb64072/5BACCD31/t51.2885-15/e35/16124052_160970824399449_3585311279906029568_n.jpg"
            alt=" image cap">
    </div>
</div>
<script>  
    var urlFollow = '{{route('user.follow')}}';
    var urlUnFollow = '{{route('user.unfollow')}}';
</script>
@endsection