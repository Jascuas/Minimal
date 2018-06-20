@extends('layouts.master') @section('tittle') Subir imagenes @endsection @section('content')
<section class="row new-post mb-5">
    <div class="col-md-12 col-md-offset-12 mx-auto">
        <header>
            <h4 class="mb-3">What do you have to say</h3>
        </header>
        <form action="{{route('post.create')}}" method=post>
            <div class="form-group form-group-sm mb-3 col-md-8">
                <textarea class="form-control shadow  mb-3 rounded" name="new_post" id="new-post" rows="3" placeholder="Posts"></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Create</button>
            <input type="hidden" name="_token" value="{{Session::token()}}">
        </form>
    </div>
</section>
<section class="row new-post">
    <div class="col-md-12 col-md-offset-12 mx-auto">
        <header>
            <h4 class="mb-3">What other people have to say</h3>
        </header>
        @foreach($posts as $post)
        <article class="post notice notice-info card shadow  mb-2 " data-postid="{{$post->id}}">
            <div class="card-body">
                <p class="card-text">{{$post->new_post}}</p>
                <ul class="nav nav-pills card-header-pills">
                    @if(Auth::user()->likes()->where('post_id', $post->id)->first()) @if(Auth::user()->likes()->where('post_id', $post->id)->first()->like==1)
                    <li class="nav-item fa-1x">    
                        <a href="#" class="nav-link like" id='dislike'>
                            <i class="fas fa-heart fa-lg" style="color:red"></i>                            
                        </a>
                    </li><span class="nav-link" style="padding-left:0" id="contid{{$post->id}}">{{$post->likes}}</span>
                    @else
                    <li class="nav-item fa-1x">
                            <a href="#" class="nav-link like" id='like'>
                                <i class="far fa-heart fa-lg" style="color:red"></i>     
                            </a>
                    </li><span class="nav-link" style="padding-left:0" id="contid{{$post->id}}">{{$post->likes}}</span>
                    @endif @else
                    <li class="nav-item fa-1x"> 
                        <a href="#" class="nav-link like" id='like'>
                            <i class="far fa-heart fa-lg" style="color:red"></i>     
                        </a>
                    </li><span class="nav-link" style="padding-left:0" id="contid{{$post->id}}">{{$post->likes}}</span>
                    @endif @if(Auth::user()==$post->user)
                    <li class="nav-item">
                        <a href="#" class="nav-link edit">
                            <i class="far fa-edit fa-lg"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('post.delete',['post_id' => $post->id])}}" class="nav-link" style="color:red">
                            <i class="far fa-trash-alt fa-lg"></i>
                            </i>
                        </a>
                    </li>
                    @endif
                </ul>
                <footer class="blockquote-footer">
                    Posted by {{$post->user->name}} on {{$post->created_at->format('d-m-Y, H:i')}}
                </footer>
            </div>
        </article>
        @endforeach
    </div>
</section>

<div class="modal" tabindex="-1" role="dialog" id="edit-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="post-body">Edit the post</label>
                        <textarea class="form-control" name="post-body" id="post-body" rows="3"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="modal-save">Save changes</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    var token = '{{Session::token()}}';
    var urlEdit = '{{route('edit')}}';
    var urlLike = '{{route('like')}}';
</script>
@endsection