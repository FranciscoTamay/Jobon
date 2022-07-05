<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- TOKEN -->
    <meta name="token" id="token" value="{{ csrf_token() }}">

    <script type="text/javascript" src="{{asset('js/vue.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/apis/apiProducto.js')}}"></script>
<script type="text/javascript" src="{{asset('js/vue-resource.js')}}"></script>
<!-- jQuery -->
<script src="{{asset('js/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>

    <!--  Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<title></title>
</head>
<body>
    <div class="container">
    <form>
          <div class="form-row">
            <div class="col">
                <label>SKU</label>
                <input type="text" class="form-control" placeholder="Ingrese el sku del producto" ><br>
        </form>
        <form>
          <div class="form-row">
            <div class="col">
                <label>Nombre</label>
                <input type="text" class="form-control" placeholder="Ingrese el nombre del producto" ><br>
        </form>
        <form>
          <div class="form-row">
            <div class="col">
                <label>Precio Publico</label>
                <input type="number" class="form-control" placeholder="Ingrese el precio publico" ><br>
        </form>
        <form>
          <div class="form-row">
            <div class="col">
                <label>Precio Veterinaria</label>
                <input type="number" class="form-control" placeholder="Ingrese el precio veterinaria" ><br>
        </form>
        <form>
          <div class="form-row">
            <div class="col">
                <label>Precio Mayoreo</label>
                <input type="number" class="form-control" placeholder="Ingrese el precio mayoreo" ><br>
        </form>
        <form>
          <div class="form-row">
            <div class="col">
                <label>Cantidad</label>
                <input type="number" class="form-control" placeholder="Ingrese el precio mayoreo" ><br>
        </form>
    </div>

</body>
</html>