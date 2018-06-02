<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('tittle')</title>
  <link rel="shortcut icon" type="image/x-icon" href="{{ URL::to('/storage/Icon.png') }}" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" type="text/css" href="{{ URL::to('css/mdb.min.css') }}"></link>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.2/css/mdb.min.css" />
  
  <!-- Required for full background image -->
  <link rel="stylesheet" type="text/css" href="{{ URL::to('css/style.css') }}"></link>

  @if(isset($welcome))
  <style>
    body {
      background: -moz-linear-gradient(45deg, rgba(213, 15, 61, 0.6), rgba(13, 17, 198, 0.69) 100%);
      background: -webkit-linear-gradient(45deg, rgba(213, 15, 61, 0.6), rgba(13, 17, 198, 0.69) 100%);
      background: linear-gradient(to 45deg, rgba(213, 15, 61, 0.6), rgba(13, 17, 198, 0.69) 100%);
    }
    
    .linea {
      width: 0;
      border-top: 1px solid #fff;
      -webkit-transition: width 2s;
      transition: width 0.3s ease-in;
    }

    footer .container a:hover~.linea {
      width: 30%;
    }
  
}
  </style>
  @else {{--
  <link rel="stylesheet/less" type="text/css" href="{{ URL::to('css/themes/'.Auth::user()->theme.'.less') }}"></link>
  <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/3.0.2/less.min.js"></script> --}} @endif
</head>

<body>
  @include('includes.header')
  <div class="container py-3 pb-5 mb-5 medio">
    @yield('content')
  </div>
  @include('includes.footer')
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe"
    crossorigin="anonymous"></script>
  <!-- JQuery -->
  <script type="text/javascript" src="{{ URL::to('js/jquery-3.2.1.min.js') }}"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="{{ URL::to('js/popper.min.js') }}"></script>
  <!-- Bootstrap core JavaScript -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
    crossorigin="anonymous"></script>
  <!-- MDB core JavaScript -->
  {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.2/js/mdb.min.js"></script> --}}
  <script type="text/javascript" src="{{ URL::to('js/mdb.min.js') }}"></script>
  <!-- App core JavaScript -->
  <script type="text/javascript" src="{{ URL::to('js/prueba.js') }}"></script>





</body>

</html>