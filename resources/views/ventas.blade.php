@extends('layaout.master')
@section('contenido')
<!-- INICIO DE VUE -->
<div id="apiVenta">
<div class="container">

<div class="col-md-6">
<div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="Escriba el codigo del producto"  v-model="sku"
  v-on:keyup.enter="buscarProd()">
  <div class="input-group-append">
    <button class="btn btn-primary" type="button" @click="buscarProd()"><i class="fa-solid fa-magnifying-glass"></i></button>
    <button class="btn btn-success" @click="showModal()"><i class="fa-solid fa-dollar-sign"></i></button>
    <button class="btn btn-secondary" @click="encontrar()">Buscar Prod.</button>
  </div>
</div>
</div>

<div class="card">
  <div class="card-body">
    <div class="col-md-12">
    <p aling="right"><h2>Folio: @{{folio}}</h2></p>
        <table class="table table-bordered">
            <thead>
                <th>SKU</th>
                <th>NOMBRE</th>
                <th>PRECIO</th>
                <th>CANTIDAD</th>
                <th>TOTAL</th>
            </thead>
            <tbody>
                <tr v-for="(venta,index) in ventas">
                  <td>@{{venta.sku}}</td>
                  <td>@{{venta.nombre}}</td>
                  <td>@{{venta.precio_publico}}</td>
                  <td><input type="number" v-model.number="cantidades[index]"></td>
                  <td>@{{totalProductos(index)}}</td>
                </tr>
            </tbody>
        </table>
    </div>
  </div>
</div>
<!-- FIN DEL CARD -->
<hr>

<div class="row">
  <div class="col-md-8"></div>
    <div class="col-md-4">
<!-- CARD DE TOTAL,IVA -->
<div class="card">
<div class="card-body">
    <div class="table table-bordered table-condensed">
      <tr>
        <th>TOTAL</th>
        <td>$ @{{granTotal}}</td>
      </tr> <br>

      <tr>
        <th>ARTICULOS</th>
        <td>@{{numArticulos}}</td>
      </tr>     
    </div>
</div>
</div>
<!-- FIN DEL CARD TOTAL,IVA -->
    </div>
  
</div>

</div>
<!-- FIN DEL CONTAINER -->
<!-- Modal -->
<!-- INICIO DE LA VENTANA MODAL -->
<div class="modal fade" id="modalCobro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" v-if="schProd == false">Asistente de Cobro</h5>
        <h5 class="modal-title" id="exampleModalLabel" v-if="schProd == true">Asistente para Encontrar Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
          <div class="form-row">
          <div class="col-md-4">
          		<label v-if="schProd == false"> A PAGAR: </label>
              <label v-if="schProd == true"> Nombre del Producto: </label>
          </div>
          <div class="col-md-4">
          		<input type="number" class="form-control" disabled :value="granTotal" v-if="schProd == false">
              <input type="text" class="form-control" v-model="nombre" v-if="schProd == true" placeholder="Escriba el nombre del producto">
          </div><br>
          </div>

          <div class="form-row">
          		<div class="col-md-2">
          			<label v-if="schProd == false">PAGA CON: </label>
                <label hidden="" v-if="schProd == true">PAGA CON: </label>
          		</div>
          <div class="col-md-4">
            <input type="number" class="form-control" v-model="pagaraCon" v-if="schProd == false">
            <input hidden="" v-if="schProd == true">
          </div><br>
          </div>

          <div class="form-row">
            <div class="col-md-2">
              <label v-if="schProd == false">SU CAMBIO ES:</label>
              <label hidden="" v-if="schProd == true"> </label>
            </div>
            <div class="col-md-4">
              <input type="text" class="form-control" disabled :value="cambio" v-if="schProd == false">
              <input hidden="" v-if="schProd == true">
            </div>
          </div>

        </form>
        <table class="table table-bordered" v-if="schProd == true">
          <thead>
            <tr>
              <th>SKU</th>
              <th>NOMBRE</th>
              <th>PRECIO</th>
              <th>CANTIDAD</th>
              <th>ACCIONES</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="producto in searchProd">
              <td>@{{producto.sku}}</td>
              <td>@{{producto.nombre}}</td>
              <td>@{{producto.precio_publico}}</td>
              <td>@{{producto.cantidad}}</td>
              <td><button class="btn btn-primary" @click="addEncontrado(producto.sku)"><i class="fa-solid fa-plus"></i></button></td>

            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-success" @click="vender()" v-if="schProd == false">Pagar</button>
        <button hidden type="button" class="btn btn-danger"  v-if="schProd == true">Finalizar</button>
        
      </div>
    </div>
  </div>
</div>
<!-- FIN DE LA VENTANA MODAL -->
<!-- FIN DE VENTANA MODAL -->
</div>
<!-- FIN DE VUE -->
@endsection
 @push('scripts')
 <script type="text/javascript" src="{{asset('js/vue.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/apis/apiVenta.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/vue-resource.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/moment-with-locales.min.js')}}"></script>
@endpush
