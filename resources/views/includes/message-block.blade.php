

@if (count($errors)>0)
    <div class="row">
        <div class=" alert alert-danger shadow mx-auto col-10 aling-left">
            <ul class="list-unstyled">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach    
            </ul>
        </div>
    </div>
 @endif

 @if (Session::has('message'))
    <div class="row">
        <div class="alert alert-light shadow mx-auto col-10">
                {{ session()->get('message') }}
        </div>
    </div>
 @endif