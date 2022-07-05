function init(){
//RUTA DE LA API QUE SE USARA 
var apiProducto='http://localhost/jobon/public/apiProductos'
//INICIO DE VUE
new Vue({
    // SE LE ASIGNA EL TOKEN
	 http: {
        headers: {
           'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
        }
    },

    el:'#productos',
    data:{
        mensaje:'HOLA SOY FRANCISCO',
        productos:[],
        sku:'',
        nombre:'',
        precio_publico:null,
        precio_veterinaria:null,
        precio_mayoreo:null,
        cantidad:null,
        editando:false,
        producto:'',
        find:'',

    },

    created() {
        this.getProductos();
    },

    methods: {
        getProductos:function(){
            this.$http.get(apiProducto).then(function(json){
                this.productos=json.data;
            }).catch(function(json){
                console.log.json
            });
        },

        showModal:function(){
            this.editando=false,
            this.sku='',
            this.nombre='',
            this.precio_publico='',
            // this.precio_veterinaria='',
            this.precio_mayoreo='',
            this.cantidad='',

            $('#modalProd').modal('show');
        },

        addProducto:function(){
            //este es el json que se enviara al controllador
            var producto={sku:this.sku,nombre:this.nombre,precio_publico:this.precio_publico,
                precio_mayoreo:this.precio_mayoreo,cantidad:this.cantidad};
            this.$http.post(apiProducto,producto).then(function(json){
                console.log('Inserccion Exitosa');
                this.getProductos();
            }).catch(function(json){
                console.log(json);
            });
            $('#modalProd').modal('hide');
        },

        editProducto:function(id){
            this.editando=true;
            this.sku=id;
            this.$http.get(apiProducto + '/' + id).then(function(json){
                this.sku=json.data.sku;
                this.nombre=json.data.nombre;
                this.precio_publico=json.data.precio_publico;
                //this.precio_veterinaria=json.data.precio_mayoreo;
                this.precio_mayoreo=json.data.precio_mayoreo;
                this.cantidad=json.data.cantidad;
               
            });
            $('#modalProd').modal('show');
        },

        updateProducto:function(){
            var jsonProd={
                sku:this.sku,
                nombre:this.nombre,
                precio_publico:this.precio_publico,
                //precio_veterinaria:this.precio_veterinaria,
                precio_mayoreo:this.precio_mayoreo,
                cantidad:this.cantidad,
            };
            this.$http.patch(apiProducto + '/' + this.sku,jsonProd).then(function(json){
                this.getProductos();
            });
            $('#modalProd').modal('hide');
        },

        deleteProducto:function(id){
            var confirmacion=confirm('Esta seguro de quere eliminar el producto?');
            if(confirmacion){
                this.$http.delete(apiProducto + '/' + id).then(function(json){
                    this.getProductos();
                }).catch(function(json){
                    console.log('Se elimino con exito');
                });
            }
            
        },
        
    },

    computed:{
        filtroProd:function(){
            return this.productos.filter((producto)=>{
                return producto.nombre.toLowerCase().match(this.find.toLowerCase().trim())
            });
        },
    }
});
//FIN DE VUE 

} window.onload = init;
