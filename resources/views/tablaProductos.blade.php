<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
	<title></title>
</head>
<body>
<div id="productos">
    <div class="container">
<div class="row">
        <div class="col-md-12">
            <div class="card card-warning">
                <div class="card-header">
                    <h4>PRODUCTOS <button class="btn btn-primary" @click="showModal()"><i class="fa-solid fa-plus"></i></button></h4>
                </div>
                <div class="card-body">
                <input type="text" placeholder="Escriba el nombre del producto"  class="form-control" v-model="find">
        <!-- INICIO DE LA TABLA -->
            <table class="table table-bordered table-striped">
                <thead>
                    <th>SKU</th>
                    <th>NOMBRE</th>
                    <th>PRECIO PUBLICO</th>
                    <!-- <th>PRECIO VETERINARIA</th> -->
                    <th>PRECIO MAYOREO</th>
                    <th>CANTIDAD</th>
                   <!-- <th>BARCODE</th> -->
                    <th>ACCIONES</th>
                </thead>

                <tbody>
                    <!-- aqui llamaremos a los datos de la tabla desde el js  -->
                       <tr v-for="producto in filtroProd">
                                <td>@{{producto.sku}}</td>
                                <td>@{{producto.nombre}}</td>
                                <td>@{{producto.precio_publico}}</td>
                                <!-- <td>@{{producto.precio_veterinaria}}</td> -->
                                <td>@{{producto.precio_mayoreo}}</td>
                                <td>@{{producto.cantidad}}</td>
                                <!-- <td><svg id="barcode"></svg></td> -->
                                 <td>
                            <button class="btn btn-success btn-sm" @click="editProducto(producto.sku)"><i class="fa-solid fa-pen-to-square"></i></button>

                            <button class="btn btn-danger btn-sm" @click="deleteProducto(producto.sku)"><i class="fa-solid fa-trash"></i></button>
                        </td>
                       
                    </tr>
                </tbody>
            </table>
        <!-- FIN DE LA TABLA -->
             </div>
         </div>
        <!-- FIN DEL CARD -->

        <!-- INICIO DE LA VENTANA MODAL -->
        <div class="modal fade" id="modalProd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" v-if="editando==false">Registro de Productos</h5>
        <h5 class="modal-title" id="exampleModalLabel" v-if="editando==true">Editando Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
          <div class="form-row">
            <div class="col">
                <label>SKU</label>
                <input type="text" class="form-control" placeholder="Ingrese el sku del producto" v-model="sku"><br>
        </form>
        <form>
          <div class="form-row">
            <div class="col">
                <label>Nombre</label>
                <input type="text" class="form-control" placeholder="Ingrese el nombre del producto" v-model="nombre"><br>
        </form>
        <form>
          <div class="form-row">
            <div class="col">
                <label>Precio Publico</label>
                <input type="number" class="form-control" placeholder="Ingrese el precio publico" v-model="precio_publico"><br>
        </form>
        <form>
          <div class="form-row">
            <div class="col">
                <label>Precio Veterinaria</label>
                <input type="number" class="form-control" placeholder="Ingrese el precio veterinaria" v-model="precio_veterinaria"><br>
        </form>
        <form>
          <div class="form-row">
            <div class="col">
                <label>Precio Mayoreo</label>
                <input type="number" class="form-control" placeholder="Ingrese el precio mayoreo" v-model="precio_mayoreo"><br>
        </form>
        <form>
          <div class="form-row">
            <div class="col">
                <label>Cantidad</label>
                <input type="number" class="form-control" placeholder="Ingrese el precio mayoreo" v-model="cantidad"><br>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary"  @click="addProducto()" v-if="editando==false">Guardar</button>
        <button type="button" class="btn btn-primary"  @click="updateProducto()" v-if="editando==true">Guardar</button>
        
      </div>
    </div>
  </div>
</div>
        <!-- FIN DE LA VENTANA MODAL -->
       </div>
     <!-- FIN DEL DIV COL-MD-12 -->
        
    </div>
 <!-- FIN DEL DIV.ROW -->

    
 <!-- <script type="text/javascript">


  
  JsBarcode("#barcode", "12345", {
  format: "codabar",
  lineColor: "#000",
  width: 2,
  height: 20,
  displayValue: true
});


</script> -->