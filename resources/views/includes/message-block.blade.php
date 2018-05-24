

@if (count($errors)>0)
    <div class="row">
        <div class="col-md-12 col-md-offset-12 mx-auto alert alert-danger shadow">
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
        <div class="col-md-12 col-md-offset-12 mx-auto alert alert-success shadow">
                {{Session::get('message')}}
        </div>
    </div>
 @endif