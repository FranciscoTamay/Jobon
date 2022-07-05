@extends('layaout.master')
@section('contenido')


<div id="productos">
    <div class="container">
    
<div class="row">
        <div class="col-md-12">
            <div class="card card-warning">
                <div class="card-header">
                    <h4>PRODUCTOS <button class="btn btn-primary" @click="showModal()"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
  <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
</svg></button></h4>
                </div>
                <div class="card-body">
                <div class="col-md-6">
                        <input type="text" placeholder="Escriba el nombre del producto"  class="form-control" v-model="find">
                    </div>
                    <br>
        <!-- INICIO DE LA TABLA -->
            <table class="table table-bordered table-striped">
                <thead>
                    <th>SKU</th>
                    <th>NOMBRE</th>
                    <th>PRECIO PUBLICO</th>
                    <!-- <th>PRECIO VETERINARIA</th> -->
                    <th>PRECIO MAYOREO</th>
                    <th>CANTIDAD</th>
                    
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
                                 <td>
                            <button class="btn btn-success btn-sm" @click="editProducto(producto.sku)"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
  <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
</svg></button>

                            <button class="btn btn-danger btn-sm" @click="deleteProducto(producto.sku)"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</svg></button>
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
        <!-- <form>
          <div class="form-row">
            <div class="col">
                <label>Precio Veterinaria</label>
                <input type="number" class="form-control" placeholder="Ingrese el precio veterinaria" v-model="precio_veterinaria"><br>
        </form>
        <form> -->
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
        <button type="button" class="btn btn-primary" @click="addProducto()" v-if="editando==false">Guardar</button>
        <button type="button" class="btn btn-warning" @click="updateProducto()" v-if="editando==true">Guardar</button>
      </div>
    </div>
  </div>
</div>
        <!-- FIN DE LA VENTANA MODAL -->
       </div>
     <!-- FIN DEL DIV COL-MD-12 -->
        
    </div>
 <!-- FIN DEL DIV.ROW -->
 @endsection
 @push('scripts')
 <script type="text/javascript" src="{{asset('js/vue.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/apis/apiProducto.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/vue-resource.js')}}"></script>




    
@endpush

