<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="token" id="token" value="{{ csrf_token() }}">
    <script src="https://kit.fontawesome.com/714fbe6707.js" crossorigin="anonymous"></script>
     <!--  Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/stylee.css')}}">

</head>
<body>
    <header class="header">
        <div class="logo-header">
            <img src="img/jobon.jpg" alt="">
        </div>
        <nav class="nav-menu">
            <ul>
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Quien soy</a></li>
                <li><a href="#">Servicios</a></li>
                <li><a href="#">Contacto</a></li>
            </ul>
        </nav>
    </header>

     
          @yield('contenido')
      






@stack('scripts')  
<!-- jQuery -->
<script src="{{asset('js/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>  




</body>
</html>