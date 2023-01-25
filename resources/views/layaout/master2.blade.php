<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- TOKEN -->
    <meta name="token" id="token" value="{{ csrf_token() }}">
    <!-- VUE JS -->
    <script type="text/javascript" src="{{asset('js/vue.js')}}"></script>
    <!-- API PRODUCTO JS -->
    <script type="text/javascript" src="{{asset('js/apis/apiProducto.js')}}"></script>
    <!-- VUE RESOURCE -->
    <script type="text/javascript" src="{{asset('js/vue-resource.js')}}"></script>
    <script src="js/JsBarcode.all.min.js"></script>
    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/714fbe6707.js" crossorigin="anonymous"></script>
    <!-- jQuery -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="js/bootstrap.js"></script>
    <!--  Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/714fbe6707.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
    <div id="sidemenu" class="menu-collapsed">
        <!-- HEADER -->
        <div id="header">
            <div id="title"><span>Vida MMR</span></div>
            <div id="menu-btn">
                <div class="btn-hamburger"></div>
                <div class="btn-hamburger"></div>
                <div class="btn-hamburger"></div>
            </div>
        </div>

        <!-- PROFILE -->
        <div id="profile">
            
            <div id="name"><span>Ararat</span></div>
        </div>

        <!-- ITEMS -->
        <div id="menu-item">
            <div class="item">
                <a href="#">
                    <div class="icon"><i class="fa-solid fa-paw"></i></div>
                    <div class="title">Veterinaria</div>
                </a>
            </div>

            <div id="item separator">

            </div>
            <div class="item">
                <a href="#">
                    <div class="icon"><i class="fa-solid fa-paw"></i></div>
                    <div class="title">Veterinaria</div>
                </a>
            </div>
        </div>

    </div>
</body>
</html>